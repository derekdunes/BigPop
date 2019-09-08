<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('release_date');//New
            $table->string('image')->nullable();//3x4 movie  photo/poster
            $table->string('cover_photo')->nullable();//6x3 background photo  //am considering removing
            $table->integer('pop_rating')->default(0);//in house bonus rating if movie needs boosting or going to be a hit
            $table->integer('rating_id')->nullable();
            $table->text('plot');
            $table->string('movie_length')->nullable();
            $table->string('movie_studio')->nullable();
            $table->string('country')->nullable();
            $table->string('imdb_id')->nullable();
            $table->bigInteger('movie_views')->default(0);
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
        Schema::dropIfExists('movies');
    }
}
