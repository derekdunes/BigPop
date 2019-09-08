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
use App\UserMovieRole;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserMovieRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = UserMovieRole::paginate(10);
        return $role;
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
        $role = new UserMovieRole();
        
        $user_id    = $request->user_id;
        $movie_id   = $request->movie_id;
        $role_type     = $request->role_type;
        $role_name     = $request->role_name;

        $role->user_id          = $user_id;
        $role->movie_id          = $movie_id;
        $role->role_type          = $role_type;
        $role->role_name          = $role_name;
       
        if ($role->save()) {
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
        $role  = UserMovieRole::find($id);

        return $role;
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
        $role       = UserMovieRole::find($id);

        $user_id    = $request->user_id;
        $movie_id   = $request->movie_id;
        $role_type     = $request->role_type;
        $role_name     = $request->role_name;

        if($user_id)
            $role->user_id      = $user_id;

        if($movie_id)
            $role->movie_id     = $movie_id;
        
        if($role_type)        
            $role->role_type    = $role_type;
        
        if($role_name)        
            $role->role_name     = $role_name;

       if ($role->save()) {

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
        UserMovieRole::find($id)->delete();
        return 'success';
    }
}
