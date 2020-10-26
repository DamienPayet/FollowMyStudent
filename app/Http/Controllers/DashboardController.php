<?php

namespace App\Http\Controllers;

use App\Offre;
use App\QuestionnaireReponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Conversation;
use App\Sujet;

class DashboardController extends Controller
{
    public function index()
    {
        $offres = Offre::all();
        $questionnaire = QuestionnaireReponse::all();
        $utilisateurs = User::all();

        return view('back.dashboard.index', compact('offres','questionnaire','utilisateurs'));

    $id = 1;
    $ok = false;
    foreach ($user->conversation as $conversation) {
      foreach ($conversation->users as $utilisateur) {
        if($utilisateur->id == $id){
          dd("salut");
          $ok = true;
        }
      }
    }
    if($ok == false){
      $conv = new Conversation;
      $conv->save();
      $conv->users()->attach($user);
      $conv->users()->attach(User::find($id));
    }
*/
    $offres = Offre::all();

    return view('back.dashboard.index', compact('offres'));
  }
}
