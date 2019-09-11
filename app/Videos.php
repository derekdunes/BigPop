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

    	return $this->hasOne(Movies::class, 'movie_videos', 'video_id', 'movie_id');

    }

    //tested
    public function users(){

    	return $this->belongsToMany(User::class, 'user_videos', 'video_id', 'user_id');

    }

}
