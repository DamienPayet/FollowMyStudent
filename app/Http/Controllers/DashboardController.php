<?php

namespace App\Http\Controllers;

use App\AuditAction;
use App\Contact;
use App\Offre;
use App\QuestionnaireReponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Conversation;
use App\Sujet;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $offres = Offre::all();
        $questionnaire = QuestionnaireReponse::all();
        $users = User::all();
        $nbruse = 0;
        foreach ($users as $usr) {
            if ($usr->questionnaire_reponses->count() > 0) {
                $nbruse++;
            }
        }
        //$log = AuditAction::all();
        $log = \LogActivity::logActivityLists();
        $contact = Contact::all();
        $utilisateurs = User::all();

        return view('back.dashboard.index', compact('log', 'contact', 'nbruse', 'offres', 'questionnaire', 'utilisateurs'));

        $id = 1;
        $ok = false;
        foreach ($user->conversation as $conversation) {
            foreach ($conversation->users as $utilisateur) {
                if ($utilisateur->id == $id) {
                    dd("salut");
                    $ok = true;
                }
            }
        }
        if ($ok == false) {
            $conv = new Conversation;
            $conv->save();
            $conv->users()->attach($user);
            $conv->users()->attach(User::find($id));
        }

        $offres = Offre::all();

        return view('back.dashboard.index', compact('offres'));
    }
}
