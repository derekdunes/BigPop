<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    //
    public function movie(){
    	return $this->belongsToMany(Movies::class,'rating_id');
    }
}
