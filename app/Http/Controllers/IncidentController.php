<?php

namespace Safetymap\Http\Controllers;

use Safetymap\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncidentController extends Controller {

    /**
    * Responds to requests to GET /books
    */

    //If have another table add in eager loading
    public function getIndex() {
        $incidents = \Safetymap\Incident::orderBy('id', 'desc')->get();
        return view('incidents.show')->with('incidents', $incidents);
    }


    public function getShow($id = null) {
        $incident =\Safetymap\Incident::find($id);

        if(is_null($incident)) {
            \Session::flash('message', 'Incident not found');
            return redirect('/');
        }

        return view('incidents.single')->with('incident', $incident);


        // return 'Show incident: '.$id;
    }


    public function getCreate() {

        // if(!\Auth::check()) {
        //     \Session::flash('message', 'You have to be logged in to create a new concern');
        //     return redirect('/');
        // }

        $neighborhoods_for_dropdown = \Safetymap\Incident::neighborhoodsForDropdown();

        return view('incidents.create')
        ->with('neighborhoods_for_dropdown', $neighborhoods_for_dropdown);
    }


    public function postCreate(Request $request) {

        $messages = [

            'not_in' => 'You have to choose a neighborhood.',
            'max' => 'You have to choose a neighborhood.'
        ];


        $this->validate($request, [
            'type'=>'required|min:3',
            'latitude'=>'required',
            'longitude'=>'required',
            'neighborhood'=> 'not_in:0|max:19'

        ], $messages);

        #Add the incident

        // $incident = new \Safetymap\Incident();
        // $incident->latitude= $request->latitude;
        // $incident->longitude= $request->longitude;
        // $incident->neighborhood = $request->neighborhood;
        // $incident->type= $request->type;
        // $incident->text= $request->text;
        //
        // $incident->save();

        #Mass Assignment

        $data= $request->only('latitude', 'longitude','neighborhood','type','text');
        $incidents = new \Safetymap\Incident($data);
        $incidents->save();

        #Mass Assignment 2
        // \Safetymap\Incident::create($data);

        \Session::flash('message', 'Your concern was added');

        return redirect('/');
    }

    public function getEdit($id){
        $incident = \Safetymap\Incident::find($id);
        $neighborhoods_for_dropdown = \Safetymap\Incident::neighborhoodsForDropdown();

        return view('incidents.edit')
        ->with('incident', $incident)
        ->with('neighborhoods_for_dropdown', $neighborhoods_for_dropdown);

    }

    public function postEdit(Request $request){
        $incident= \Safetymap\Incident::find($request->id);

        $incident->latitude = $request->latitude;
        $incident->longitude = $request->longitude;
        $incident->neighborhood = $request->neighborhood;
        $incident->type = $request->type;
        $incident->text = $request->text;



        $incident->save();


        \Session::flash('message', 'Your changes were saved');
        return redirect ('/edit/'.$request->id);
    }
}
