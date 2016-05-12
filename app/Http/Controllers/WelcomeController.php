<?php
# /app/Http/Controllers/WelcomeController.php

namespace Safetymap\Http\Controllers;

use Safetymap\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {

        # Logged in users should not see the welcome page, send them to the books index instead.
        if(\Auth::check()) {
            return redirect('/create');
        }

        return view('incidents.home');
    }

}
