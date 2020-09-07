<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionnaireQuestion;
use App\QuestionnairePart;
class StudentFrontController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function questionnaire()
  {


    return view("front.questionnaire.index");
  }
  public function questions()
  {
    //Verification des champs
    $parts = QuestionnairePart::all();
    $questions = QuestionnaireQuestion::all();

    return response()->json(['questions' => $questions , 'parts' => $parts]);

  }
  public function questions_start(){
    $parts = QuestionnairePart::all();
    dd($parts);
        return view("front.questionnaire.question");
  }

  public function forum()
  {
    return view("front.forum.index");
  }
  public function forum_mes_sujets()
  {
    return view("front.forum.mes_sujets");
  }
  public function offre()
  {
    return view("front.offre.index");
  }

}
