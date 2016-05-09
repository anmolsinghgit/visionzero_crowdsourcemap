<?php

use Illuminate\Database\Seeder;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidents')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'latitude' => 42.3658459,
       'longitude' => -71.054227,
       'neighborhood' => 'North End',
       'type' => 'It’s hard to see cyclists and pedestrians',
       'text' => 'Very narrow one way street with construction work being done. Potentially hazardous for pedestrians, cyclists, and motorists.',
        ]);


        DB::table('incidents')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'latitude' => 42.36067,
       'longitude' => -71.055847,
       'neighborhood' => ' North End',
       'type' => 'Of something not listed here',
       'text' => 'Cars heading south on North St block the box which makes it unsafe for pedestrians and hard for cars on Clinton St turning left',
        ]);


        DB::table('incidents')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'latitude' => 42.3606773,
       'longitude' => -71.0573705,
       'neighborhood' => 'Financial District/Downtown',
       'type' => 'Pedestrians cross away from the crosswalks',
       'text' => "People constantly ignore the walk or don't walk signals and cross in front of cars who have the light. They also cross away from the crosswalks and walk down the median. It's dangerous for themselves and for others.",
        ]);

    }

}
