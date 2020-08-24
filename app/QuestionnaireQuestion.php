<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestion extends Model
{
  public function part()
  {
    return $this->belongsTo('App\QuestionnairePart');
  }
  public function reponses()
  {
    return $this->hasMany('App\QuestionnaireReponse');
  }
}
