<?php

namespace App\Modules\Content\Models;

use App\Modules\Content\Models\BaseModel;
use Mediapress\Modules\MPCore\Models\CountryGroup;
use Mediapress\Modules\MPCore\Models\Language;
use Mediapress\Modules\MPCore\Models\Url;
use Mediapress\Traits\HasMFiles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mediapress\Modules\Content\Traits\IsDetail;

class CategoryDetail extends BaseModel
{
    use HasMFiles;
    use SoftDeletes;
    use IsDetail;

    protected $table = 'category_details';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        "category_id",
        "language_id",
        "country_group_id",
        "website_id",
        "manual_meta",
        "name",
        "slug",
        "detail",
        "status"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function countryGroup()
    {
        return $this->belongsTo(CountryGroup::class, "country_group_id", "id");
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function extras()
    {
        return $this->hasMany(CategoryDetailExtra::class);
    }

    public function url()
    {
        return $this->morphOne(Url::class, 'model')->withTrashed()->withDefault(['url' => '/'])->whereIn('type', ['original', 'reserved'])->orderBy('type', 'asc');
    }

    public function urls()
    {
        return $this->morphOne(Url::class, 'model')->withDefault(['url' => '/']);
    }

    public function getParentIdAttribute()
    {
        return $this->category_id;
    }

    public function sitemap()
    {
        if ($this->category) {
            return $this->category->sitemap();
        }
        return null;
    }

    public function setSlugAttribute($value)
    {
        if (mb_substr($value, 0, 1) != '/') {
            $this->attributes['slug'] = '/' . $value;
        } else {
            $this->attributes['slug'] = $value;
        }

    }

    public function getDetailAttribute($value)
    {
        return supFront($value, 'detail', $this);
    }

    public function getNameAttribute($value)
    {
        return supFront($value, 'name', $this);
    }

}
