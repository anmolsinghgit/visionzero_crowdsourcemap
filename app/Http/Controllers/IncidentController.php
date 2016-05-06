<?php

namespace Safetymap\Http\Controllers;

use Safetymap\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncidentController extends Controller {

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return 'List all the incidents';
    }


    public function getShow($id) {
        return 'Show incident: '.$id;
    }


    public function getCreate() {
        return view('incidents.create');
    }


    public function postCreate(Request $request) {
        $this->validate($request, [
            'title'=>'required|min:3'
        ]);
        return 'Add the book: '.$request->input('title');

    }
}