<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'name' => "Avengers Infinity War",
             'image'     => 'https://upload.wikimedia.org/wikipedia/en/4/4d/Avengers_Infinity_War_poster.jpg',
            'release_date'   =>  20190601000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.',
            'country'      => 'USA',
            'imdb_id'      => 'tt4154756',
            'movie_views' => 1200,
            'pop_rating' => 10 
        ]);

        DB::table('movies')->insert([
            'name' => "The Incredible Hulk",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190611000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 1000,
            'pop_rating' => 6 
        ]);

        DB::table('movies')->insert([
            'name' => "Thor Ragnarok",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190605000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 500,
            'pop_rating' => 3 
        ]);

        DB::table('movies')->insert([
            'name' => "Avengers: Infinity War",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190611000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 1500,
            'pop_rating' => 6
        ]);

        DB::table('movies')->insert([
            'name' => "Avengers: End Game",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190601000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 2000,
            'pop_rating' => 7 
        ]);

        DB::table('movies')->insert([
            'name' => "Iron Man 1",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190602000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 250,
            'pop_rating' => 0
        ]);

        DB::table('movies')->insert([
            'name' => "Iron Man 2",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190610000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 50,
            'pop_rating' => 0 
        ]);

        DB::table('movies')->insert([
            'name' => "Iron Man 3",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190702000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot'         => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 1000,
            'pop_rating' => 5

        ]);

        DB::table('movies')->insert([
            'name' => "Captain America",
             'image'     => 'https://m.media-amazon.com/images/M/MV5BMTUyNzk3MjA1OF5BMl5BanBnXkFtZTcwMTE1Njg2MQ@@._V1_UX182_CR0,0,182,268_AL__QL50.jpg',
            'release_date'   =>  20190720000000,
            'rating_id'    => DB::table('ratings')->where('name', 'PG-13')->pluck('id')->first(),
            'plot' => 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper. ',
            'country'      => 'USA',
            'imdb_id'      => 'tt0800080',
            'movie_views' => 500,
            'pop_rating' => 2 
        ]);
    }
}
