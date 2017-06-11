<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return View::make('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/relationships', 'RelationshipController@index')->name('relationships');

Route::post('/relationship', 'RelationshipController@create')->name('relationship');

Route::get('/relations', 'RelationController@index')->name('relations');

Route::post('/relation', 'RelationController@create')->name('relation');

Route::post('/cusLogin', 'Auth\LoginController@authenticate')->name('cusLogin');
