<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Genre;
use Response;

class GenreController extends Controller
{
    //return JSON
    public function index() {
      //Genre::all() returns an array of genre models
      //by default - laravel translates to JSON
      //return Genre::all();

      return ['genres' => Genre::all()];
    }

    public function show($id) {
      $genre = Genre::find($id);
      if(!$genre) {
        return Response::json([
          'error' => 'Genre not found'
        ], 404);
      }

      return ['genre' => $genre];
    }
}
