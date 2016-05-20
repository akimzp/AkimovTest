<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citye extends Model
{
    protected $fillable = [
        'id','city',
    ];
    
    protected $hidden = [
        'remember_token',
    ];
}
