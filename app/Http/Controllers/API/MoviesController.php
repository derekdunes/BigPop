<?php

namespace App\Http\Controllers\API;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Genre;
use App\Roles;
use App\Movies;
use App\Videos;
use App\Photos;
use App\Ratings;
use App\CastCrew;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Tested
     */
    public function index()
    {
        $movies = Movies::paginate(10);
        return $movies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $roles    = Roles::all();
        $casts    = User::whereIn('role_id', array('2','3'))->get();
        $crews    = User::whereIn('role_id', array('7'))->get();
        $genres   = Genre::all();  
        $ratings  = Ratings::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Tested
     */
    public function store(Request $request)
    {
        $movie = new Movies();
        
        $name          = $request->name;
        $release_date  = $request->release_date;
        $image         = $request->image;
        $cover_photo = $request->cover_photo;
        $pop_rating    = $request->pop_rating;
        $rating_id     = $request->rating_id;
        $plot          = $request->plot;
        $movie_length  = $request->movie_length;
        $movie_studio  = $request->movie_studio;
        $country       = $request->country;
        $imdb_id       = $request->imdb_id;

        $movie->name          = $name;
        $movie->release_date  = $release_date;
        $movie->image         = $image;
        $movie->cover_photo   = $cover_photo;
        $movie->rating_id     = $rating_id;
        $movie->pop_rating    = $pop_rating;
        $movie->plot          = $plot;
        $movie->movie_length  = $movie_length;
        $movie->movie_studio  = $movie_studio;
        $movie->country       = $country;
        $movie->imdb_id       = $imdb_id;

        if ($movie->save()) {
            return 'success';
        } else {
            return 'false';
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Tested
     */
    public function show($id)
    {
        $movie  = Movies::with('casts','photos','videos','genres','reviews','reviewers')->find($id);
        $movie->movie_views = $movie->movie_views + 1;
        $movie->save();
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */
    public function edit($id)
    {
        $movie    = Movies::find($id);
        $casts    = User::whereIn('role_id', array('2','3'))->get();
        $crews    = User::whereIn('role_id', array('7'))->get();
        $genres   = Genre::all();  
        $ratings  = Ratings::all();        
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie         = Movies::find($id);

        $name          = $request->name;
        $release_date  = $request->release_date;
        $image         = $request->image;
        // $cover_photo   = $request->cover_photo;
        $pop_rating    = $request->pop_rating;
        $rating_id     = $request->rating_id;
        $plot          = $request->plot;
        $movie_length  = $request->movie_length;
        $movie_studio  = $request->movie_studio;
        $country       = $request->country;
        $imdb_id       = $request->imdb_id;

        //check for null values
        if($name)
            $movie->name          = $name;

        if($release_date)
            $movie->release_date  = $release_date;
        
        if($image)
            $movie->image         = $image;
        
        // if($cover_photo)
        //     $movie->$cover_photo  = $cover_photo;

        if($pop_rating)
            $movie->pop_rating    = $pop_rating;
        
        if ($rating_id) 
            $movie->rating_id     = $rating_id;

        if($plot)
            $movie->plot          = $plot;
        
        if($movie_length)
            $movie->movie_length  = $movie_length;
        
        if($movie_studio)
            $movie->movie_studio  = $movie_studio;

        if($imdb_id)
            $movie->imdb_id       = $imdb_id;

        //$crews  =  explode(",",$request->crew_value);
        //cast_ids is an array of user_ids of actors, actress, director, etc of the movie
        //genre_ids is an array of genres of the movie
        //photos_ids is an array of photos of the movie
        //video_ids is an array of videos of the movie

        //separate the array
        $genres = explode(",",$request->genre_ids);
        $casts  =  explode(",",$request->cast_ids);
        $photos = explode(",",$request->photo_ids);
        $videos = explode(",",$request->video_ids);

        if(isset($videos) && count($videos) > 0)
        {
            foreach($videos as $video)
            {   
                $video = Videos::find($video);

                if ($video) {
                    $movie->videos()->attach($video);
                }
            }
        }

        if(isset($photos) && count($photos) > 0)
        {
            foreach($photos as $photo)
            {   
                $photo = Photos::find($photo);

                if ($photo) {
                    $movie->photos()->attach($photo);
                }
            }
        }

        if(isset($genres) && count($genres) > 0)
        {
            foreach($genres as $genre)
            {   
                $genre = Genre::find($genre);

                if ($genre) {
                    $movie->genres()->attach($genre);
                }
            }
        }


        if(isset($casts) && count($casts) > 0)
        {
            foreach($casts as $cast)
            {   
                $user = User::find($cast);

                if ($user) {
                    $movie->casts()->attach($user);
                }
            }
        }

       if ($movie->save()) {

            return 'success';

        }else {

            return 'false';

        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Movies::find($id)->delete();
        return 'success';
    }
}
