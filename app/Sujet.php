<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function categorie()
  {
    return $this->belongsTo('App\SujetCategorie', 'categorie_id');
  }
  public function reponses()
  {
    return $this->hasMany('App\SujetReponse');
  }

}
