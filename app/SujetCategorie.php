<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetCategorie extends Model
{
  public function sujets()
  {
    return $this->hasMany('App\Sujet');
  }
  public function section()
  {
    return $this->belongsTo('App\Section','section_id');
  }
}
