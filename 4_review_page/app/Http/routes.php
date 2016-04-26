<?php

Route::group(['middleware' => 'web'], function() {
  Route::get('/dvds/search', 'dvdController@search');
  Route::get('/dvds', 'dvdController@results');

  Route::get('/dvd/new', 'ReviewController@create');
  Route::post('/dvd/store', 'ReviewController@store');
});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']], function () {
    //
});
