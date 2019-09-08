<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Votes(){
        return $this->hasMany(Votes::class);
    }

    //tested
    public function photos(){

        return $this->belongsToMany(Photos::class, 'user_photos', 'user_id', 'photo_id');
    
    }

    //teted
    public function videos(){

        return $this->belongsToMany(Videos::class, 'user_videos', 'user_id', 'video_id');
    
    }

    //tested
    public function movies(){

        return $this->belongsToMany(Movies::class, 'cast_crews','movie_id','user_id');

    }

    //tested
    public function movie_roles($user_id){

        return $this->hasMany(UserMovieRole::class);
    }

    //tested
    public function reviews(){

        return $this->hasMany(Reviews::class);
    }

    //tested
    public function roles(){
        return $this->belongsToMany(Roles::class,'cast_crews', 'role_id', 'user_id');
    }

    //tested
    public function reviewedMovies(){
        return $this->belongsToMany(Movies::class, 'reviews', 'user_id', 'movie_id');
    }

}
