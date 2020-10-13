<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetCategorie extends Model
{
  public function sujets()
  {
    return $this->hasMany('App\Sujet','categorie_id');
  }
  public function section()
  {
    return $this->belongsTo('App\Section','section_id');
  }
}
