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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change', 'HomeController@gotochangepassword');
Route::post('/chngepassword', 'HomeController@chageyourpassword');
Route::get('/userdetails', 'HomeController@gotouserdetails');
Route::get('/edit/{id}', 'HomeController@gotoedit');
Route::post('/update', 'HomeController@updatedata');






