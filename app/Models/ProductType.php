<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model 
{

    protected $table = 'product_type';
    public $timestamps = true;
    protected $fillable = array('product_id', 'type_id');

}