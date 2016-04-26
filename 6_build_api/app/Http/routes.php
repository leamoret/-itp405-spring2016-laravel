<?php

Route::group(['middleware' => 'web'], function() {
  Route::get('/search', 'dvdController@search');
  Route::get('/results', 'dvdController@results');

  Route::get('/dvd/new', 'ReviewController@create');
  Route::post('/dvd/store', 'ReviewController@store');
});

//api
Route::group(['prefix' => '/api/v1', 'namespace' => 'API'], function() {
  //GET api/v1/genres
  Route::get('genres', 'GenreController@index');

  //GET api/v1/genres/{id}
  Route::get('genres/{id}', 'GenreController@show');

  //GET api/v1/dvds
  Route::get('dvds', 'DvdController@index');

  //GET api/v1/dvds/{id}
  Route::get('dvds/{id}', 'DvdController@show');

  //POST api/v1/dvds
  Route::post('dvds', 'DvdController@store');

});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']], function () {
    //
});
