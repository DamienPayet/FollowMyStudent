<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetReponse extends Model
{
  public function user()
  {
    return $this->belongto('App\User');
  }
  public function sujet()
  {
    return $this->belongto('App\Sujet');
  }
}
