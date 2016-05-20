<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lengviche extends Model
{
    protected $fillable = [
        'id','langvich',
    ];

   
    protected $hidden = [
        'remember_token',
    ];
}
