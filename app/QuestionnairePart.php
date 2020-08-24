<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnairePart extends Model
{
  public function questions()
  {
    return $this->hasMany('App\QuestionnaireQuestion');
  }
}
