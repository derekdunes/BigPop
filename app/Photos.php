<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    protected $fillable = [
        'photo','description'
    ];

    public function movie(){

    	return $this->belongsToMany(Movies::class, 'movie_photos', 'movie_id', 'photo_id');

    }

    //tested
    public function users(){

    	return $this->belongsToMany(User::class, 'user_photos', 'user_id', 'photo_id');

    }

}
