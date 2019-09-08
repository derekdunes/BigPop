<?php

namespace App\Http\Controllers;

use App\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GenreController extends Controller
{
     public function index()
    {
        $movies = new Movies();
        
        $headline = $movies->headline();
        $latestMovies = $movies->latestMovies();
        $trendingMovies = $movies->TrendingMovies();
        $upcomingMovies = $movies->upcomingMovies();

        return view('movies.index', compact('headline','latestMovies','trendingMovies','upcomingMovies'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles    = Roles::all();
        // $casts    = User::whereIn('role_id', array('2','3'))->get();
        // $crews    = User::whereIn('role_id', array('7'))->get();
        $genres   = Genre::all();  
        $ratings  = Ratings::all();

        return view('movies.create', compact('genres','ratings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movies();
        
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

        $movie->save();

        return redirect('movies')->with('message', 'New Movie added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie  = Movies::with('reviews','photos','videos','genres', 'casts')->find($id);
        $movie->movie_views = $movie->movie_views + 1;
        $movie->save();

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie    = Movies::with('reviews','photos','videos','genres', 'casts')->find($id); 
        $ratings  = Ratings::all();
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres', 'ratings'));
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

        $movie->save();

        // $concatGenres = '';
        $genres = $request->genres;

        // foreach ($genres as $gen){

        //     $concatGenres = $concatGenres . ',' . $gen;            

        // }


        // $casts  =  explode(",",$request->cast_ids);
        // $photos = explode(",",$request->photo_ids);
        // $videos = explode(",",$request->video_ids);

        // if(isset($videos) && count($videos) > 0)
        // {
        //     foreach($videos as $video)
        //     {   
        //         $video = Videos::find($video);

        //         if ($video) {
        //             $movie->videos()->attach($video);
        //         }
        //     }
        // }

        // if(isset($photos) && count($photos) > 0)
        // {
        //     foreach($photos as $photo)
        //     {   
        //         $photo = Photos::find($photo);

        //         if ($photo) {
        //             $movie->photos()->attach($photo);
        //         }
        //     }
        // }

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


        // if(isset($casts) && count($casts) > 0)
        // {
        //     foreach($casts as $cast)
        //     {   
        //         $user = User::find($cast);

        //         if ($user) {
        //             $movie->casts()->attach($user);
        //         }
        //     }
        // }

        return redirect('movies')->with('message', 'Movie updated!');

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
        return redirect('movies')->with('message', 'Movie deleted!');
    }

}
