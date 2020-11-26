<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetReponse extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function sujet()
  {
    return $this->belongTo('App\Sujet');
  }
}
