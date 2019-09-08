<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMovieRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_movie_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('movie_id');
            $table->integer('user_id');
            $table->string('role_type')->nullable();//actor or director in the movie
            $table->string('role_name')->nullable();//name in the 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_movie_roles');
    }
}
