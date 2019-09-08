<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Photos;
use Faker\Generator as Faker;

$factory->define(Photos::class, function (Faker $faker) {
    return [
        'photo' => $faker->url,
        'description' => $faker->sentence
    ];
});
