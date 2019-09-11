<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function genre(){

    	return $this->belongsToMany(Movies::class, 'movie_genres', 'genre_id', 'movie_id');

    }

}
