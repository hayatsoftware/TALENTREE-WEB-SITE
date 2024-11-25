<?php

namespace App\Modules\Content\Models;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Sitemap;
use Mediapress\Modules\Content\Models\CategoryDetail;
use Mediapress\Modules\Content\Models\Criteria;
use Mediapress\Modules\Content\Models\Property;
use Mediapress\Modules\Content\Models\Page;
use Mediapress\Modules\Content\Models\CategoryPage;
use Mediapress\Modules\MPCore\Models\Language;
use Mediapress\Modules\MPCore\Models\Url;
use App\Modules\Content\Models\BaseModel;
use Mediapress\Traits\HasMFiles;
use Mediapress\Modules\Content\Traits\HasDetails;
use App;

class Category extends BaseModel
{
    use SoftDeletes;
    use HasMFiles;
    use HasDetails;

    public const CATEGORY_ID = "category_id";
    protected $table = 'categories';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = ["sitemap_id", self::CATEGORY_ID,"admin_id","category_tag","status", "lft", "rgt", "depth","status", 'ctex_1', 'ctex_2', 'cvar_1', 'cvar_2', 'cvar_3', 'cvar_4', 'cvar_5', 'cint_1', 'cint_2', 'cint_3', 'cint_4', 'cint_5', 'cdat_1', 'cdat_2', 'cdec_1', 'cdec_2', 'cdec_3', 'cdec_4'];

    public function sitemap()
    {
        return $this->belongsTo(Sitemap::class);
    }

    public function details()
    {
        return $this->hasMany(CategoryDetail::class);
    }

    public function extras()
    {
        return $this->hasMany(CategoryExtra::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, self::CATEGORY_ID,'id');
    }
    public function criterias()
    {
        return $this->belongsToMany(Criteria::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function pages()
    {
        if ($this->panel || App::runningInConsole()) {
            return $this->belongsToMany(Page::class);
        } else {
            return $this->belongsToMany(Page::class)->where(function($q){
                return $q->where('pages.status', 1)->
                orWhere(function ($q) {
                    return $q->where('pages.status', 5)
                        ->whereRaw('`pages`.`published_at` < NOW()');
                });
            });
        }

    }

    public function getAllPages()
    {
        if(!$this->exists){
            return new Collection();
        }

        $ids=[$this->id];

        $subids = Category::where('lft',">",$this->lft)->where('rgt',"<",$this->rgt)->select("id")->get()->pluck("id")->toArray();

        $ids = array_merge($ids,$subids);

        $page_ids = CategoryPage::whereIn(self::CATEGORY_ID,$ids)->select("page_id")->get()->pluck("page_id")->toArray();

        return Page::whereIn("id",$page_ids)->status()->get();

    }

    public function urls()
    {
        return $this->hasManyThrough(Url::class, CategoryDetail::class);
    }
}
