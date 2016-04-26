<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Genre;
use App\Models\Rating;

class Dvd extends Model
{
     protected $hidden = ['created_at', 'updated_at', 'format_id', 'sound_id', 'label_id', 'release_date'];

     //returns the genre
     public function genre()
     {
       return $this->belongsTo('App\Models\Genre');
     }


     //returns the rating
     public function rating()
     {
       return $this->belongsTo('App\Models\Rating');
     }

}
