<?php

namespace App\Http\Controllers\API;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Genre;
use App\Roles;
use App\Movies;
use App\Reviews;
use App\Ratings;
use App\CastCrew;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::paginate(10);
        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rating    = Ratings::all();
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
     */
    public function store(Request $request)
    {
        $review = new Reviews();
        
        $user_id    = $request->user_id;
        $movie_id   = $request->movie_id;
        $rating     = $request->rating;
        $rev     = $request->review;
        $recommend  = $request->recommend;

        $review->user_id          = $user_id;
        $review->movie_id          = $movie_id;
        $review->rating          = $rating;
        $review->review          = $rev;
        $review->recommend          = $recommend;

        if ($review->save()) {
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
     */
    public function show($id)
    {
        $review  = Reviews::find($id);
        return $review;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rating    = Ratings::find($id);
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
        $review       = Reviews::find($id);

        $user_id    = $request->user_id;
        $movie_id   = $request->movie_id;
        $rating     = $request->rating;
        $rev     = $request->review;
        $recommend  = $request->recommend;

        if($user_id)
            $review->user_id          = $user_id;
        
        if($movie_id)
            $review->movie_id          = $movie_id;
        
        if($rating)        
            $review->rating          = $rating;
        
        if($rev)        
            $review->review          = $rev;

        if($recommend)
            $review->recommend          = $recommend;

       if ($review->save()) {

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
        Reviews::find($id)->delete();
        return 'success';
    }
}
