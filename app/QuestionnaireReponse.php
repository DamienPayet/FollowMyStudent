<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireReponse extends Model
{
  public function question()
  {
    return $this->belongsTo('App\QuestionnaireQuestion');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
