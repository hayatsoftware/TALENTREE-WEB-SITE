<?php

namespace App\Modules\Content\Models;

use App\Modules\Content\Models\BaseModel;

class CategoryDetailExtra extends BaseModel {

    protected $table = 'category_detail_extras';

    public $timestamps = true;

    protected $fillable = ["category_detail_id","key", "value"];

    public function categoryDetail()
    {
        return $this->belongsTo(CategoryDetail::class);
    }

    public function parent()
    {
        return $this->categoryDetail->parent();
    }


    public function getValueAttribute($value){
        return supFront($value,'value',$this);
    }
}
