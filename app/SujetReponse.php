<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetReponse extends Model
{
  public function sujet()
  {
    return $this->belongTo('App\Sujet');
  }
  public function users()
   {
       return $this->belongsToMany('App\User');
   }
}
