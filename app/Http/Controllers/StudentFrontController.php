<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionnaireQuestion;
use App\QuestionnairePart;
use App\QuestionnaireReponse;
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
  public function response_store (Request $request){
    foreach($request->tab as $value){
      $reponse = new QuestionnaireReponse;
      $reponse->reponse = $value[1];
      $reponse->question_id = $value[0];
      $reponse->user_id = 1;
      $reponse->save();
    }
    return response()->json(['parts' => $request->tab]);
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
