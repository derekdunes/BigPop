<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
        'video', 'description'
    ];

    //not functional
    public function movie(){

    	return $this->hasOne(Movies::class, 'movie_videos', 'movie_id', 'video_id');

    }

    //tested
    public function users(){

    	return $this->belongsToMany(User::class, 'user_videos', 'user_id', 'video_id');

    }

}
