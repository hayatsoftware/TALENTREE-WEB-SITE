<?php

namespace App\Modules\Content\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Mediapress\Modules\Content\Models\Page;
use Session;


class BaseModel extends Model
{
    const PASSIVE = 0;
    const ACTIVE = 1;
    const DRAFT = 2;
    const PREDRAFT = 3;
    const PENDING = 4;
    const POSTDATE = 5;
    public const STATUS = "status";
    public $panel =false;


    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();

        $this->initializeTraits();

        $this->syncOriginal();

        $this->fill($attributes);

        $this->statuscheck();
        if(isPanel()){
            $this->panel = true;
            mediapress('panel',true);
        }
    }
    public static function preCreate($data = [])
    {
        //dump("session.panel.user exists?");
        if (Session::has('panel.user')) {

            $model = static::class;
            $model = new $model;

            $admin = Session::get('panel.user');
            $existing_temp_model = $model->where("admin_id", $admin->id)->where(self::STATUS, self::PREDRAFT)->first();

            if ($existing_temp_model) {

                // Eğer modele ait details varsa temizle
                if ($existing_temp_model->details) {
                    $existing_temp_model->details()->get()->each->url()->each->forceDelete();
                    $existing_temp_model->details->each->forceDelete();
                }
                $existing_temp_model->forceDelete();
            }


            $data = array_merge(["admin_id" => $admin->id, self::STATUS => self::PREDRAFT], $data);
            $model->unguarded(function () use ($model, $data, &$isModel) {
                $isModel = $model->create($data);
            });

            return $isModel;
        } else {
            return false;
        }
    }

    public static function scopeStatus($query, $status = self::ACTIVE)
    {

        if($status == 1 && $query->getModel() instanceof Page){

            return $query->where(function ($q) use ($status){
                return $q->where(self::STATUS, $status)->
                    orWhere(function ($q) use($status){
                        return $q->where(self::STATUS, 5)
                          ->whereRaw('published_at < NOW()');
                });

            });
        }
        elseif (is_array($status)) {
            return $query->whereIn(self::STATUS, $status);
        } else {
            return $query->where(self::STATUS, $status);
        }
    }

    public  function statuscheck(){
        return $this->scopePublished($this);
    }
    public static function scopePublished($query, $filter = [])
    {
        // TODO :: düzenlenecek
        $query = $query->where(function ($query) {
            $query->whereRaw('published_at < NOW()')->orWhereNull('published_at');
        });

        if ($filter) {
            if (isset($filter['date'])) {
                return $query->whereRaw('DATE(published_at) = ' . $filter['date']);
            } else if (isset($filter['year'])) {
                return $query->whereRaw('YEAR(published_at) = ' . $filter['year']);
            } else if (isset($filter['month'])) {
                return $query->whereRaw('MONTH(published_at) = ' . $filter['month']);
            } else if (isset($filter['day'])) {
                return $query->whereRaw('DAY(published_at) = ' . $filter['day']);
            }
        }

        return $query;
    }


    public function __get($key)
    {
        $attribute = $this->getAttribute($key);

        if ($attribute) {
            return $attribute;
        }

        if (strpos($key, 'f_') !== false) {
            $file_key = mb_substr($key, 2);
            $files = $this->mfiles($file_key)->get();
            if(count($files) == 1){
                return $files->first();
            }elseif(count($files)<1){
                return null;
            }
            return $files;
        }

        if (strpos($key, 'c_') !== false) {
            $file_key = mb_substr($key, 2);
            return $this->mfiles($file_key)->get();
        }

        if (isset($this->extras) && $this->extras instanceof Collection) {
            $extras = $this->extras->where('key', $key)->get();
        } else if (method_exists($this, 'extras')) {
            $extras = $this->extras()->where('key', $key)->get();
        }

        if(isset($extras)){
            if(count($extras) == 1){
                $extra = $extras->first();
                if (isset($extra->value)) {
                    return $extra->value;
                }
            }elseif(count($extras) > 1){
                return $extras->pluck("value")->toArray();
            }
        }

        return $attribute;
    }

}
