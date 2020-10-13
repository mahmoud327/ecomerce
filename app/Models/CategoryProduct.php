<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model 
{

    protected $table = 'catogory_product';
    public $timestamps = true;
    protected $fillable = array('product_id', 'category_id');

}