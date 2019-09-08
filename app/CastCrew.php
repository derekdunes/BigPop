<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastCrew extends Model
{
    //

    protected $fillable = [
        'movie_id','user_id','role_id','role_name'
    ];


}
