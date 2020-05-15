<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wall', 'WallController@index')->name('wall');

// route qui permet de register le form
Route::post('/postonwall', 'WallController@postonwall')->name('postonwall');
// route pour delete avec un param dans une route
Route::get('/deletepost/{id}', 'WallController@deletepost')->name('deletepost');

//Update
Route::get('/editpost/{id}', 'WallController@editpost')->name('editpost'); // pour afficher
Route::post('/updatepost/{id}', 'WallController@updatepost')->name('updatepost'); //pour register

