<?php

Route::get('/dvds/search', 'dvdController@search');
Route::get('/dvds', 'dvdController@results');


Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']], function () {
    //
});
