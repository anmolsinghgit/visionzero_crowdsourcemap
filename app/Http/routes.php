<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------



| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#--------------------------
#Authentication
#---------------------------
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');
# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');
# Process logout
Route::get('/logout', 'Auth\AuthController@logout');
# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');
# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

#--------------------------
#Application Routes
#----------------------------

#Welcome
Route::get('/', 'WelcomeController@getIndex');

#View incidents according to user
Route::get('/view', 'IncidentController@getIndex');

#View all incidents
Route::get('/index','IncidentController@getAll');

Route::get('/test', 'IncidentController@getData');

Route::group(['middleware'=> 'auth'], function() {

    #Create submission
    Route::get('/create', 'IncidentController@getCreate');
    Route::post('/create', 'IncidentController@postCreate');


    #Edit submission
    Route::get('/edit/{id?}', 'IncidentController@getEdit');
    Route::post('/edit', 'IncidentController@postEdit');

    #Delete submission
    Route::get('/confirm-delete/{id?}', 'IncidentController@getConfirmDelete');
    Route::get('/delete/{id?}', 'IncidentController@getDoDelete');

    #Show more info according to incident
    Route::get('/show/{id?}', 'IncidentController@getShow');

});

#Parsing of data from ArcGIS Map Service
Route::get('/data', 'PracticeController@getEx24');
