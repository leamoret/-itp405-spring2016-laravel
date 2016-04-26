<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Dvd;

class Genre extends Model
{
    public function dvd()
    {
      return $this->hasMany('App\Models\Dvd');
    }
}
