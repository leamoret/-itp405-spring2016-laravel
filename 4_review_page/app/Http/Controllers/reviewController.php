<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class reviewController extends Controller
{
    public function create(Request $request) {
      $id = $request->input('dvd_id');
      //$id = $request->input('dvd_id');
      //echo $id;

      $info = DB::table('dvds')
          ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
          ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
          ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
          ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
          ->where('dvds.id', '=', $id);
      $info = $info->get();

      $all_reviews = DB::table('reviews')
        ->select('title', 'description', 'rating');
      $all_reviews = $all_reviews->get();

      return view('dvd.create', ['info_dvd' => $info, 'all_reviews' => $all_reviews]);
    }

    public function store(Request $request) {

      $validation = Validator::make($request->all(), [
        'title' => 'required|min:5',
        'description' => 'required|min:10'
      ]);

      if($validation->fails()) {
        return redirect('dvd/new')->withErrors($validation);
      }

      DB::table('reviews')
        ->insert([
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'rating' => $request->input('rating')
        ]);

      return redirect('dvd/new')->with('success', true);
    }
    //
    // public function reviews(Request $request) {
    //   //this page displays all reviews
    //   $all_reviews = DB::table('reviews')
    //     ->select('title', 'description', 'rating');
    //   $all_reviews = $all_reviews->get();
    //
    //   return view('dvd/reviews', ['all_reviews' => $all_reviews]);
    //
    // }
}
