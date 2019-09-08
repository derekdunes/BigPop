<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Movies;
use App\User;

class UserMovieRole extends Model
{
    //
    public function movie(){

    	return $this->belongsTo(Movies::class);
    
    }

    public function user(){

    	return $this->belongsTo(User::class);

    }
    
}
