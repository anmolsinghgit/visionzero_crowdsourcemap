<?php

namespace Safetymap\Http\Controllers;

use Safetymap\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JavaScript;

class PracticeController extends Controller {



    public function getEx26() {

        $apiUrl = "http://map01.cityofboston.gov:6080/arcgis/rest/services/BTD/VZSafety/MapServer/0/query?inSR=4326&where=1%3D1&outSR=4326&outFields=*&returnGeometry=true&f=json&callback";
        $jsonStringResults = file_get_contents($apiUrl);

        $data = json_decode($jsonStringResults, true);

        # Show all the data
        dump($data);

        # Loop through the data printing just the title for each book
        foreach($data['features'] as $incident) {
            echo $incident['attributes']['REQUESTTYPE'].'<br>';
            echo $incident['attributes']['COMMENTS'].'<br>';
            echo $incident['geometry']['x'].'<br>';
            echo $incident['geometry']['y'].'<br>';

        }
        return view('practice.test')->with('incident', $incident);
    }
    public function getEx25(){

        # Eager load the target with the incident
            $incidents = \Safetymap\Incident::with('target')->orderBy('target_id', 'ASC')->get();

            foreach($incidents as $incident) {
            echo $incident->target->mode. '<br>';
            }
            dump($incidents->toArray());
    }


    public function getEx24() {
        $apiUrl = "http://map01.cityofboston.gov:6080/arcgis/rest/services/BTD/VZSafety/MapServer/0/query?inSR=4326&where=1%3D1&outSR=4326&outFields=*&returnGeometry=true&f=json&callback";
        $jsonStringResults = file_get_contents($apiUrl);

        $data = json_decode($jsonStringResults, true);

        # Show all the data
        dump($data);

        # Loop through the data printing just the title for each book
        foreach($data['features'] as $incident) {
            echo $incident['attributes']['REQUESTTYPE'].'<br>';
            echo $incident['attributes']['COMMENTS'].'<br>';
            echo $incident['geometry']['x'].'<br>';
            echo $incident['geometry']['y'].'<br>';

        }

    }

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
        $incident->user_id = 2;
        $incident->target_id = 2;
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
