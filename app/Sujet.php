<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
  public function user()
  {
    return $this->belongsto('App\User');
  }
  public function categorie()
  {
    return $this->belongto('App\SujetCategorie');
  }
  public function reponses()
  {
    return $this->belongto('App\SujetReponse');
  }

}
