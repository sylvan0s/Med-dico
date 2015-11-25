<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'Users\UsersController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('home', 'HomeController@index');
Route::get('contact', 'ContactController@index');
Route::get('recherche', 'RechercheController@index');
Route::post('recherche', 'RechercheController@search');
Route::get('admin', 'Admin\AdminController@index');

// Test
Route::get('test', 'TestController@index');


// Medicament routes
Route::get('medicaments/fiche/{id}', 'Medicaments\MedicamentsController@show');
Route::get('medicaments/add', 'Medicaments\MedicamentsController@create');
Route::get('medicaments/update/{id}', 'Medicaments\MedicamentsController@ShowUpdate');
Route::post('medicaments/update/{id}', 'Medicaments\MedicamentsController@update');
Route::post('medicaments/new', 'Medicaments\MedicamentsController@news');

//Route::delete('medicaments/{id}', 'Medicaments\MedicamentsController@destroy');

Route::group(['prefix' => 'api'], function() {

    Route::post('login', 'Api\AuthController@login');
    Route::post('search', 'Api\SearchController@search');

    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
        Route::post('logout', 'Api\AuthController@logout');

        Route::get('test', function(){
            return response()->json(['foo'=>'bar']);
        });
    });
});