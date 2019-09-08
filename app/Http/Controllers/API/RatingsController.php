<?php

namespace App\Http\Controllers\API;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Genre;
use App\Roles;
use App\Movies;
use App\Ratings;
use App\CastCrew;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Ratings::paginate(10);
        return $rating;
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
        $rating = new Ratings();
        
        $name          = $request->name;
        $description  = $request->description;

        $rating->name          = $name;
        $rating->description  = $description;

        if ($rating->save()) {
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
        $rating  = Ratings::find($id);
        return $rating;
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
        $rating         = Ratings::find($id);

        $name          = $request->name;
        $description  = $request->description;
       
        if($name)
            $rating->name          = $name;

        if($description)
            $rating->description  = $description;
        
        
       if ($rating->save()) {

            return 'success';

        }else {

            return 'false';

        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @parasm  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Ratings::find($id)->delete();
        return 'success';
    }
}
