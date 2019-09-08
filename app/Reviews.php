<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    public function movie(){

    	return $this->belongsTo(Movies::class);
    
    }

    public function user(){

    	return $this->belongsTo(User::class);

    }

    public function vote(){

    	return $this->hasOne(Votes::class);
    
    }


}
