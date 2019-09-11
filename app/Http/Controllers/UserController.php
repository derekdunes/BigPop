<?php

namespace App\Http\Controllers;

use App\User;
use App\Genre;
use App\Roles;
use App\Photos;
use App\Videos;
use App\Movies;
use App\Ratings;
use App\CastCrew;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $email      = $request->email;
        //$date       = $request->birth_date;
        $image      = $request->image;
        
        if ($request->password != $request->confirm_password) {
            # code...
            //return redirect('users.create')->with{'message','Password does not Match'};
            return;
        }

        $password   = bcrypt($request->password);
        $bio        = $request->bio;
        $role_id    = $request->role_id;

        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;
        $user->password   = $password;
        $user->role_id    = $role_id;
        $user->bio        = $bio;
        //$user->date       = $date;
        $user->profile_pic = $image;
        $user->save();

        $movies = $request->movied;
        $photos = $request->photod;
        $videos = $request->videod;

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

        if(isset($movies) && count($movies) > 0)
        {
            foreach($movies as $movie)
            {   
                $movie = Movies::find($movie);

                if ($movie) {
                    $user->movies()->attach($movie);
                }
            }
        }

        return redirect('user')->with('message', 'New User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::with('photos','movies','videos')->find($id);
        $user->user_views = $user->user_views + 1;
        $user->save();
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::with('videos','photos','movies')->find($id);
        $roles = Roles::all();
        return view('users.edit', compact('roles','user'));
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
        //$date       = $request->birth_date;
        $image      = $request->image;

        $password   = bcrypt($request->password);
        $bio        = $request->bio;
        $role_id    = $request->role_id;

        if ($first_name)
            $user->first_name = $first_name;
        
        if ($last_name)
            $user->last_name  = $last_name;
        
        if ($email)
            $user->email      = $email;
        
        if ($role_id)
            $user->role_id    = $role_id;
        
        if ($bio)
            $user->bio        = $bio;
        
        //if ($date)
            //$user->date       = $date;
        
        if ($image)
            $user->profile_pic = $image;
        
        $user->save();

        $movies = $request->movied;
        $photos = $request->photod;
        $videos = $request->videod;

        if(isset($videos) && count($videos) > 0)
        {
            foreach($videos as $video)
            {   
                $video = Videos::find($video);

                if ($video) {
                    $user->videos()->sync([$video->id], false);
                }
            }
        }

        if(isset($photos) && count($photos) > 0)
        {
            foreach($photos as $photo)
            {   
                $photo = Photos::find($photo);

                if ($photo) {
                    $user->photos()->sync([$photo->id], false);
                }
            }
        }

        if(isset($movies) && count($movies) > 0)
        {
            foreach($movies as $movie)
            {   
                $movie = Movies::find($movie);

                if ($movie) {
                    $user->movies()->sync([$movie->id], false);
                }
            }
        }

        return redirect('users')->with('message', 'User updated!');

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
        return redirect('users')->with('message', 'User deleted!');
    }
    
}
