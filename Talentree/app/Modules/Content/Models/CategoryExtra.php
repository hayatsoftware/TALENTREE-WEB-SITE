<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryExtra extends Model {

    protected $table = 'category_extras';

    public $timestamps = true;

    protected $fillable = ["category_id","key", "value"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
