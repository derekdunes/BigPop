<?php

namespace App\Http\Controllers\API;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Genre;
use App\Roles;
use App\Photos;
use App\Movies;
use App\Ratings;
use App\CastCrew;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photos::paginate(10);
        return $photos;
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
     */
    public function store(Request $request)
    {
        $photo = new Photos();
        
        $phot          = $request->photo;
        $description  = $request->description;

        $video->photo          = $phot;
        $video->description    = $description;
        
        if ($video->save()) {
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
        $photo  = Photos::find($id);
        return $photo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie    = Photos::find($id);
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
        $photo         = Photos::find($id);

        $phot          = $request->photo;
        $description  = $request->description;

        if($phot)
            $photo->photo          = $phot;

        if($description)
            $photo->description  = $description;

       if ($photo->save()) {

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
        Photos::find($id)->delete();
        return 'success';
    }
}
