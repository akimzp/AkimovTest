<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries_lengviche extends Model
{
    protected $fillable = [
        'id','idcountry','idlengvich'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
