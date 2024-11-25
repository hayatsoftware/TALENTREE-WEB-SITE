<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCriteria extends Model {

	protected $table = 'category_criteria';
	public $timestamps = false;

	public $fillable = ['category_id', 'criteria_id'];

}
