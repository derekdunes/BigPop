<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'role_id'    =>  DB::table('roles')->where('name', 'Actor')->pluck('id')->first(),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
