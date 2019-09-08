<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //Used to get/find movies tied to Roles(Actor,Actress,Directors)

    //tested
    public function actors(){
        return $this->belongsToMany(User::class,'cast_crews', 'role_id', 'user_id');
    }

}
