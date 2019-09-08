<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Videos;
use Faker\Generator as Faker;

$factory->define(Videos::class, function (Faker $faker) {
    return [
        'video' => $faker->url,
        'description' => $faker->sentence

    ];
});
