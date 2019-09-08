<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert(['name' => "G",'description' => "General Audiences - all ages admitted"]);
        DB::table('ratings')->insert(['name' => "PG",'description' => "Parental Guidance suggested - Some material may not be suitable for children"]);
        DB::table('ratings')->insert(['name' => "PG-13", 'description' => "Parents strongly cautioned - Some material may be in appropriate for children under 13"]);
        DB::table('ratings')->insert(['name' => "R", 'description' => "Restricted - Under 17 requires accompanying parent or adult guardian"]);
        DB::table('ratings')->insert(['name' => "NC-17",'description' => "Adults Only - No one 17 and Under Admitted"]);]);
    }
}
