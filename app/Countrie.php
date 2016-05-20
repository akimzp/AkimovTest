<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $fillable = [
        'id','country',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
