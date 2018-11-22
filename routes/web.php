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

Route::get('/', function () {
    //view('welcome')
    return 'Hotels Rservation System' ;
});
Route::get('/register', 'RegistrationController@create');

Route::post('register', 'RegistrationController@store');


Route::get('/createRoom', 'RoomCOntrollers@create');
Route::post('/createRoom', 'RoomCOntrollers@submit');

Route::get('/createHotel', 'Hotels@create');
Route::post('/createHotel', 'Hotels@submit');

//Route::get('/getHotelList', 'Hotels@getHotelList');
Route::get('/getHotelList', 'Hotels@getHotelByID');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

