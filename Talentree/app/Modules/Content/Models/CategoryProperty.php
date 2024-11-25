<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model {

	protected $table = 'category_property';

	public $timestamps = false;

	protected $fillable = ["category_id","property_id"];

}
