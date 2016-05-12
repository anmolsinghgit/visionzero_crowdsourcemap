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
       'type' => 'It’s hard to see cyclists',
       'text' => 'Very narrow one way street with construction work being done. Potentially hazardous for pedestrians, cyclists, and motorists.',
        'user_id'=>1,
        'target_id'=>1,
        ]);


        DB::table('incidents')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'latitude' => 42.36067,
       'longitude' => -71.055847,
       'neighborhood' => 'North End',
       'type' => 'Of something not listed here',
       'text' => 'Cars heading south on North St block the box which makes it unsafe for pedestrians and hard for cars on Clinton St turning left',
       'user_id'=>1,
       'target_id'=>2,
        ]);


        DB::table('incidents')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'latitude' => 42.3606773,
       'longitude' => -71.0573705,
       'neighborhood' => 'Financial District/Downtown',
       'type' => 'Pedestrians cross away from the crosswalks',
       'text' => "People constantly ignore the walk or don't walk signals and cross in front of cars who have the light. They also cross away from the crosswalks and walk down the median. It's dangerous for themselves and for others.",
       'user_id'=>1,
       'target_id'=>2,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.3588463,
        'longitude' => -71.3588463,
        'neighborhood' => 'Downtown',
        'type' => 'People double park their vehicles',
        'text' => "This section of congress is very narrow but taxis regularly stop to drop off passengers and back up traffic into the intersection. Also Ubers and other people dropping off/picking up. Paint curbs red and strongly enforce no stopping/idling.",
         'user_id'=>1,
         'target_id'=>3,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Dorchester',
        'type' => 'Too many lanes to cross',
        'text' => "An old woman tried to cross a parking lane, 2 travel lanes, 2 trolley tracks, and then 2 more travel lanes from The Mission towards the Santander. Her carriage kept getting stuck on the tracks and I feared a turning vehicle would wipe her out!",
         'user_id'=>1,
         'target_id'=>2,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Roxbury',
        'type' => 'The roadway surface needs improvement',
        'text' => "The divider island has sunk into the ground and there's poor signage about the left lane needing to turn left onto S Huntington. Cars always crash into the median and take out the signs.",
         'user_id'=>2,
         'target_id'=>3,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'West End',
        'type' => 'Speed',
        'text' => "People drive like they're in a road race. The physical landscape seems to support this behavior.",
         'user_id'=>2,
         'target_id'=>3,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Hyde Park',
        'type' => 'Cars do not yield',
        'text' => "They roll into the crosswalk and block bike's or pedestrian's way across.",
         'user_id'=>2,
         'target_id'=>2,
        ]);



                \DB::table('incidents')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'latitude' => 42.30175671,
                'longitude' => -71.0978396443,
                'neighborhood' => 'Dorchester',
                'type' => 'Bike facilities do not exist or need improvement',
                'text' => "Dangerous pinch point for cyclists going North on Dorchester Ave. Wide intersection quickly turns into two very narrow lanes (w/ sharrows). Cars/trucks can easily squeeze out a bike where road narrows.",
                 'user_id'=>2,
                 'target_id'=>1,
                ]);

                \DB::table('incidents')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'latitude' => 42.30175671,
                'longitude' => -71.0978396443,
                'neighborhood' => 'Brighton',
                'type' => 'Of something not listed here',
                'text' => "The bike lane is wide enough to accommodate a car, so drivers use it as a driving lane. The city should install flex-posts to prevent driving in the bike lane.",
                 'user_id'=>2,
                 'target_id'=>1,
                ]);

                \DB::table('incidents')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'latitude' => 42.30175671,
                'longitude' => -71.0978396443,
                'neighborhood' => 'Back Bay',
                'type' => 'Of something not listed here',
                'text' => "Biking from Watertown towards Boston, there is no street light to follow when going along the bike path. Bikers have to guess which directions currently have green.",
                 'user_id'=>2,
                 'target_id'=>1,
                ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Charlestown',
        'type' => 'Bike facilities or they need maintenance',
        'text' => "Drivers fly down this block at 40 mph. There is no bike lane, so the only way to even moderately safely ride on this block is to take the lane. Unfortunately this tends to make drivers EXTREMELY angry, which creates a new set of safety concerns.",
         'user_id'=>2,
         'target_id'=>1,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Allston',
        'type' => 'Cars do not yield',
        'text' => "Left hook risk here, at least dash the bike lane through the intersection.",
         'user_id'=>2,
         'target_id'=>1,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Chinatown',
        'type' => 'Speed',
        'text' => "Particularly going eastbound, cars go very fast in anticipation of merging onto the Mass Pike",
         'user_id'=>2,
         'target_id'=>3,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'East Boston',
        'type' => 'Cars do not yield',
        'text' => "Riding south on Harrison to Warren through here is very sketch",
         'user_id'=>2,
         'target_id'=>3,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Fenway',
        'type' => 'It’s hard to see cyclists',
        'text' => "It's pretty difficult for a new cyclist or runner to find their way through here when the Neponset River greenway ends",
         'user_id'=>2,
         'target_id'=>2,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Jamaica Plain',
        'type' => 'People run red lights / stop signs',
        'text' => "People ignore the no left turn sign ( in front of the police station) and it is often destroyed",
         'user_id'=>1,
         'target_id'=>1,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Mattapan',
        'type' => 'The roadway surface needs improvement',
        'text' => "Dangerous",
         'user_id'=>1,
         'target_id'=>2,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Mission Hill',
        'type' => 'People double park their vehicles',
        'text' => "People park in the bus lane making it hard for buses to go straight and drivers to turn right",
         'user_id'=>1,
         'target_id'=>1,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'Roslindale',
        'type' => 'Cars do not yield',
        'text' => "They roll into the crosswalk and block bike's or pedestrian's way across.",
         'user_id'=>1,
         'target_id'=>1,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'South Boston',
        'type' => 'The roadway surface needs improvement',
        'text' => "The pavement especially in the bike lanes needs to be repaired. I prefer to take the lane here as otherwise it's a mess.",
         'user_id'=>2,
         'target_id'=>3,
        ]);


        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'South End',
        'type' => 'Speed',
        'text' => "I live here. cut through traffic regularly hit 40mph and fail to stop. there's a playground and tons of children in this neighborhood.",
         'user_id'=>2,
         'target_id'=>2,
        ]);

        \DB::table('incidents')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'latitude' => 42.30175671,
        'longitude' => -71.0978396443,
        'neighborhood' => 'West Roxbury',
        'type' => 'People run red lights / stop signs',
        'text' => "Drivers do not stop at the stop sign",
         'user_id'=>2,
         'target_id'=>1,
        ]);

    }

}
