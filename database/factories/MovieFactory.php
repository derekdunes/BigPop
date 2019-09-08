<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Movies;
use Faker\Generator as Faker;

$factory->define(Movies::class, function (Faker $faker) {
    return [
            'name' => $faker->name,
            'release_year'  => $faker->year,
             'image'     => $faker->url,
            // 'genre_id'   =>  DB::table('genres')->where('name', 'Action')->pluck('id')->first(),
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => $faker->sentence,
            'country'      => $faker->country,
            'imdb_id'      => 'tt4154756'
    ];
});
