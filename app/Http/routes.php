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
Route::get('test', 'TestController@index');

// Medicament routes
Route::get('medicaments/fiche/{id}', 'Medicaments\MedicamentsController@show');
Route::get('medicaments/add', 'Medicaments\MedicamentsController@create');
Route::post('medicaments/new', 'Medicaments\MedicamentsController@news');
Route::delete('medicaments/{id}', 'Medicaments\MedicamentsController@destroy');
