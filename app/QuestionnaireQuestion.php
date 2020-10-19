<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestion extends Model
{
  public function part()
  {
    return $this->belongsTo('App\QuestionnairePart','questionnaire_part_id');
  }
  public function reponses()
  {
    return $this->hasMany('App\QuestionnaireReponse');
  }
    public function master_question()
    {
        return $this->belongsTo('App\QuestionnaireQuestion','questionnaire_question_id');
    }
    public function sous_question()
    {
        return $this->hasMany('App\QuestionnaireQuestion');
    }
}
