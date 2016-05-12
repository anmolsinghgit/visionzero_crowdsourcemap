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
        $incidents = \Safetymap\Incident::where('user_id','=', \Auth::id())->orderBy('id', 'desc')->get();
        return view('incidents.show')->with('incidents', $incidents);
    }


    public function getAll() {
        $incidents = \Safetymap\Incident::orderBy('id', 'desc')->get();
        return view('incidents.index')->with('incidents', $incidents);
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


        $neighborhoods_for_dropdown = \Safetymap\Incident::neighborhoodsForDropdown();
        $types_for_dropdown = \Safetymap\Incident::typesForDropdown();
        $targets_for_dropdown = \Safetymap\Incident::targetsForDropdown();

        return view('incidents.create')
        ->with('neighborhoods_for_dropdown', $neighborhoods_for_dropdown)
        ->with('types_for_dropdown', $types_for_dropdown)
        ->with('targets_for_dropdown', $targets_for_dropdown);
    }


    public function postCreate(Request $request) {

        $messages = [

            'not_in' => 'You have to choose an option.',
            'max' => 'You have to choose a neighborhood.'
        ];


        $this->validate($request, [
            'type'=>'required|not_in:0',
            'latitude'=>'required',
            'longitude'=>'required',
            'neighborhood'=> 'not_in:0|max:19',
            'text'=> 'required',
            'target_id'=> 'not_in:0|required|max:11',


        ], $messages);

        // #Add the incident
        //
        $incident = new \Safetymap\Incident();
        $incident->latitude= $request->latitude;
        $incident->longitude= $request->longitude;
        $incident->neighborhood = $request->neighborhood;
        $incident->type= $request->type;
        $incident->text= $request->text;
        $incident->user_id = \Auth::id();
        $incident->target_id= $request->target_id;
        //
        // dump($request->target_id);
         $incident->save();

        #Mass Assignment

        // $data= $request->only('latitude', 'longitude','neighborhood','type','text', 'mode');
        // $incidents = new \Safetymap\Incident($data);
        // $incidents->save();

        #Mass Assignment 2
        // \Safetymap\Incident::create($data);

        \Session::flash('message', 'Your concern was added');

        return redirect('/index');
    }

    public function getEdit($id=null){


        $incident = \Safetymap\Incident::find($id);

        if(is_null($incident)) {
            \Session::flash('message', 'Incident not found');
            return redirect('/index');
        }


        $neighborhoods_for_dropdown = \Safetymap\Incident::neighborhoodsForDropdown();
        $types_for_dropdown = \Safetymap\Incident::typesForDropdown();
        $targets_for_dropdown = \Safetymap\Incident::targetsForDropdown();

        return view('incidents.edit')
        ->with('incident', $incident)
        ->with('neighborhoods_for_dropdown', $neighborhoods_for_dropdown)
        ->with('types_for_dropdown', $types_for_dropdown)
        ->with('targets_for_dropdown', $targets_for_dropdown);

    }

    public function postEdit(Request $request){
        $incident= \Safetymap\Incident::find($request->id);

        $incident->latitude = $request->latitude;
        $incident->longitude = $request->longitude;
        $incident->neighborhood = $request->neighborhood;
        $incident->type = $request->type;
        $incident->text = $request->text;
        $incident->target_id= $request->target_id;

        dump($request->target_id);
        $incident->save();


        \Session::flash('message', 'Your changes were saved');
        return redirect ('/show/'.$request->id);
    }

    public function getConfirmDelete($id) {

        $incident= \Safetymap\Incident::find($id);

        return view('incidents.delete')->with('incident', $incident);
    }

    public function getDoDelete($id) {

        # Get the book to be deleted
        $incident = \Safetymap\Incident::find($id);

        if(is_null($incident)) {
            \Session::flash('message','Incident not found.');
            return redirect('/');
        }



        #  delete the book
        $incident->delete();

        # Done
        \Session::flash('message',$incident->type.' was deleted.');
        return redirect('/');

    }
    // public function postValue(Request $request){
    //     $lat = $request['lat'];
    //     $long = $request['long'];
    //
    //     print $lat;
    //
    // }
}
