<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'main_categories';
    public $timestamps = true;
    protected $fillable = array('name');



    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }


}
