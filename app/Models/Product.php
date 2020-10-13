<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model 
{
  /*  use SearchableTrait;

    
    protected $searchable = [
      
        'columns' => [
            'products.name' => 10,
            'products.part_number' => 10,

          
        ]
        ];
        */
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('image','name');

    

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    
}