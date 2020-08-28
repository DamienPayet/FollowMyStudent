<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
