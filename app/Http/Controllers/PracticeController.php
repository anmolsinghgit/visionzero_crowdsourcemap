<?php

namespace Safetymap\Http\Controllers;

use Safetymap\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PracticeController extends Controller {

    public function getEx16() {

        $incidents = \Safetymap\Incident::orderBy('id', 'desc')->get();
        echo $incidents->first();
        return view('practice.index')->with('incidents', $incidents);
    }
    public function getEx6 () {
        # First get a book to update
        $incident = \Safetymap\Incident::where('neighborhood', 'LIKE', '%North%')->first();

        # If we found the book, update it
        if($incident) {

            # Give it a different title
            $incident->neighborhood = 'The North End';

            # Save the changes
            $incident->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Incident not found, can't update.";
        }
    }

    public function getEx5 () {
        $incidents = \Safetymap\Incident::all();
         foreach($incidents as $incident) {
             echo $incident->type. '<br>';
         }
    }

    public function getEx4 () {

        #Instantiate a new Incident Model object
        $incident = new \Safetymap\Incident();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $incident->latitude= 42.358551;
        $incident->longitude = -71.053229;
        $incident->neighborhood = 'South Boston Waterfront';
        $incident->type = 'People double park their vehicles';
        $incident->text = 'Nearly every day there is a Budweiser or other beer delivery truck (never Harpoon, though!) double parked on India St. Sometimes they are even partially blocking Milk. This makes it impossible to see down India street for oncoming traffic.';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `incidents` table, with the above data
        $incident->save();

        echo 'Added: '.$incident->type;
    }

    public function getEx3 (){

        // Use the QueryBuilder to run a raw SQL select command
        $incidents= \DB::select("SELECT * FROM incidents WHERE neighborhood LIKE '%North%'");

        // Output the results
        foreach($incidents as $incident) {
            echo $incident->type.'<br>';
        }

    }

    public function getEx2() {


                \DB::table('incidents')->insert([
               'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
               'latitude' => 42.3588463,
               'longitude' => -71.056711,
               'neighborhood' => 'Financial District/Downtown',
               'type' => 'People double park their vehicles',
               'text' => "This section of congress is very narrow but taxis regularly stop to drop off passengers and back up traffic into the intersection. Also Ubers and other people dropping off/picking up. Paint curbs red and strongly enforce no stopping/idling.",
                ]);

                return 'Added incident';
    }

    public function getEx1() {
                // Use the QueryBuilder to get all the books
        $incidents = \DB::table('incidents')->get();

        // Output the results
        foreach ($incidents as $incident) {
            echo $incident->neighborhood;
        }
    }



}
