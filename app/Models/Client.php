<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
        
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array( 'email', 'username', 'password');



}