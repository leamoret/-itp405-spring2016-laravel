<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;

use Response;
use Validator;

class DvdController extends Controller
{
    public function index() {

      $dvds = [];
      $genres = [];
      $ratings = [];

      $more = true;
      $id = 0;
      $number = 0;

      while ($number < 20)
      {
        $dvd = Dvd::find($id);

        if($dvd)
        {
          array_push($dvds, $dvd);
          $number ++;

          $genre = $dvd->genre;
          if(! in_array($dvd->genre, $genres))
          {
            array_push($genres, $dvd->genre);
          }
          if(! in_array($dvd->rating, $ratings))
          {
            array_push($ratings, $dvd->rating);
          }
        }
        $id ++;
      }

      return [
        'dvds' => $dvds, 'genres' => $genres, 'ratings' => $ratings
      ];

    }

    public function show($id) {
      $dvd = Dvd::find($id);

      if(!$dvd) {
        return Response::json([
          'error' => 'Dvd not found'
        ], 404);
      }
      $genre = $dvd->genre;
      $rating = $dvd->rating;

      return ['dvds' => $dvd, 'genres' => $genre, 'ratings' => $rating];
    }

    public function store(Request $request)
    {

      $validation = Validator::make($request->all(), [
            'title' => 'required|unique:dvds,title'
     ]);

     if($validation->passes())
     {
       $dvd = new Dvd();
       $dvd->title = $request->input('title');
       $dvd->save();

       return ['dvds' => $dvd];
     }

     return Response::json([
            'errors' => [
                'title' => $validation->errors()->get('artist_name')
            ]
        ], 422);
    }
}
