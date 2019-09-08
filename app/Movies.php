<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Movies extends Model
{

	//tested
	public function headline(){
		//remember to add highest reviews
		$movies = Movies::whereDate('release_date', '<=', date('d'))->orderBy('pop_rating','desc')->orderBy('movie_views','desc')->take(5)->get();

		return $movies;
	}

	//tested
	public function latestMovies(){
		//remember to add highest reviews

		$movies = Movies::whereDay('release_date', '<=', date('d'))->orderBy('release_date','desc')->orderBy('pop_rating','desc')->orderBy('movie_views','desc')->take(10)->get();

		return $movies;
	}

	//tested
	public function TrendingMovies(){
	
		$movies = Movies::whereDay('release_date', '<=', date('d'))->orderBy('release_date','desc')->orderBy('movie_views','desc')->orderBy('pop_rating','desc')->take(10)->get();

		return	$movies;
	
	}

	//tested
	public function upcomingMovies(){

		 $movies = Movies::whereDay('release_date', '>=', date('d'))->orderBy('release_date','desc')->orderBy('pop_rating','desc')->orderBy('movie_views','desc')->take(10)->get();

		 return $movies;
	
	} 

    //tested
    public function reviews(){

    	return $this->hasMany(Reviews::class, 'movie_id');

    }

    //tested
    public function rating()
    {
       return $this->belongsTo(Ratings::class);
    }

    //tested
    public function photos(){

    	return $this->belongsToMany(Photos::class, 'movie_photos', 'movie_id', 'photo_id');
    
    }

    //tested
    public function videos(){

    	return $this->belongsToMany(Videos::class, 'movie_videos', 'movie_id', 'video_id');
    
    }

    //tested
    public function reviewers(){
    	return $this->belongsToMany(User::class, 'reviews', 'user_id', 'movie_id');
    }

    //tested
    public function genres(){

    	return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');

    }

    //tested
    public function casts(){

    	return $this->belongsToMany(User::class, 'cast_crews','movie_id','user_id');

    }

    //tested
    // public function user_roles(){

    //     return $this->hasMany(UserMovieRole::class, 'movie_id');
    // }


}
