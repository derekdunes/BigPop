<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    //
    protected $fillable = [
        'movie_id','Genre_id',
    ];

}
