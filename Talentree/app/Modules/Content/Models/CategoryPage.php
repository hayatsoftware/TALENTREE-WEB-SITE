<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPage extends Model {

	protected $table = 'category_page';

	public $timestamps = false;

	protected $fillable = [
	    'category_id',
	    'page_id'
    ];

}
