<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class dvdController extends Controller
{
    public function search() {
      $genres = DB::table('genres')
      ->select('genre_name')
      ->get();

      $ratings = DB::table('ratings')
      ->select('rating_name')
      ->get();

      return view('search', [
        'allgenres' => $genres,
        'allratings' => $ratings
      ]);
    }

    public function results(Request $request) {

      $dvd_title = $request->input('dvd_input');

      $dvd_genre = $request->input('Genres');
      $dvd_rating = $request->input('Ratings');

        if (!$dvd_title) {
          $dvds = DB::table('dvds')
          ->select('title', 'dvds.id as id_dvd', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
          ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
          ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
          ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
          ->get();

          return view('results', [
            'mydvds' => $dvds,
            'searchTerm' => "All Dvds",
            'searchGenre' => "All Genres",
            'searchRating' => "All Ratings"
          ]);
        }

        $dvds = DB::table('dvds')
          ->select('title', 'dvds.id as id_dvd', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
          ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
          ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
          ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
          ->where('title', 'like', "%$dvd_title%");

          if($dvd_genre !== 'all')
          {
            $dvds = $dvds->where('genre_name', '=', $dvd_genre);
          }

          if($dvd_rating !== 'all')
          {
             $dvds = $dvds->where('rating_name', '=', $dvd_rating );
          }

          $dvds = $dvds->get();


        return view('results' , [
          'mydvds' => $dvds,
          'searchTerm' => $dvd_title,
          'searchGenre' => $dvd_genre,
          'searchRating' => $dvd_rating
        ]);
    }
}
