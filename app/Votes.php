<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    //

    public function user(){

    	return $this->belongTo(User::class);

    }

    public function reviews(){
    
    	return $this->belongsTo(Reviews::class);
    
    }
}
