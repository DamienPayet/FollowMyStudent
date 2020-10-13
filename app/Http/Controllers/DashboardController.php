<?php

namespace App\Http\Controllers;

use App\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Conversation;
class DashboardController extends Controller
{
  public function index()
  {
/*
    $user =  auth::user();
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
