<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Roles;
use App\Videos;
use App\Photos;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user       = new User();
        
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $email      = $request->email;
        $password   = bcrypt($request->password);
        $bio        = $request->bio;
        $role_id    = $request->role;

        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;
        $user->password   = $password;
        $user->role_id    = $role_id;
        $user->bio        = $bio;
        $user->save();

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::with('movies', 'photos', 'videos', 'roles')->find($id);
        // $user->user_views = $user->user_views + 1;
        // $user->save();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::find($id);
        $roles = Roles::all();
      
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
        $user       = User::find($id);
        
        $first_name = $request->first_name;

        $last_name  = $request->last_name;
        
        $email      = $request->email;

        $password   = bcrypt($request->password);

        $bio        = $request->bio;
        
        $role_id    = $request->role;

        
        if($request->first_name)
            $user->first_name = $first_name;
        
        if($request->last_name)        
            $user->last_name  = $last_name;
        
        if($request->email)
            $user->email      = $email;

        if($request->password)        
            $user->password   = $password;
    
        if($request->role)
            $user->role_id    = $role_id;

        if($request->bio)
            $user->bio        = $bio;

        $movies  =  explode(",",$request->movie_ids);
        $photos = explode(",",$request->photo_ids);
        $videos = explode(",",$request->video_ids);
        //$roles = explode(",",$request->role_ids); create separate pivot table for this

        if(isset($videos) && count($videos) > 0)
        {
            foreach($videos as $video)
            {   
                $video = Videos::find($video);

                if ($video) {
                    $user->videos()->attach($video);
                }
            }
        }

        if(isset($photos) && count($photos) > 0)
        {
            foreach($photos as $photo)
            {   
                $photo = Photos::find($photo);

                if ($photo) {
                    $user->photos()->attach($photo);
                }
            }
        }

        // if(isset($roles) && count($roles) > 0)
        // {
        //     foreach($roles as $role)
        //     {   
        //         $role = Roles::find($role);

        //         if ($role) {
        //             $user->roles()->attach($role);
        //         }
        //     }
        // }


        if(isset($movies) && count($movies) > 0)
        {
            foreach($movies as $movie)
            {   
                $movie = Movies::find($movie);

                if ($user) {
                    $user->movies()->attach($movie);
                }
            }
        }

        $user->save();

       return "success";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return "success";
    }
}
