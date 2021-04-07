<?php

namespace App\Http\Controllers;

use App\HomePost;
use Illuminate\Http\Request;
use App\QuestionnaireQuestion;
use App\QuestionnairePart;
use App\QuestionnaireReponse;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Image;
use Illuminate\Support\Facades\Storage;
use Redirect;
use function Sodium\add;

class StudentFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('email')->except(['ajaxRequestReaded','home','edit','email_update','update']);

        $this->middleware('auth');

    }

    public function home()
    {
        $post = HomePost::all();
        \LogActivity::addToLog('Affichage poste');

        return view('front.index', compact('post'));
    }

    public function edit(User $user, Request $request)
    {
        $user = Auth::user();

        $images = \File::allFiles(public_path('front/images/avatars'));
        return view('front.user.edit', compact('user', 'images'));
    }

    public function show(User $user)
    {
        $user = Auth::user();
        return view('front.user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        \LogActivity::addToLog('Utilisateur - Modification profil');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6',
            'captcha' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        //Récupération de l'id de l'utilisateur
        //$user->email_verified_at == null;
        //$user->save();

        if ($user->email_verified_at == null) {

            $getmail = $request->input('email');

            if ($user->email != $getmail) {
                $user->email = $request->input('email');
                $user->sendEmailVerificationNotification();
                $user->updated_at = now();
                $user->save();
                return redirect()->route('front.users.edit', $user)->with('message', 'Nouvelle adresse enregistrée! Un email de validation viens d\'etre envoyé.');
            } elseif ($user->email == $getmail) {
                $user->sendEmailVerificationNotification();
                $user->updated_at = now();
                $user->save();
                return redirect()->route('front.users.edit', $user)->with('message', 'Un email de validation viens d\'etre envoyé.');
            }
        } elseif ($user->email_verified_at != null) {

            $getmail = $request->input('email');
            if ($request->input('password') != null) {
                $user->password = bcrypt($request->input('password'));
            }
            if (request('imagechoisie') != null) {
                $user->image_profil = $request->input('imagechoisie');
            }
            if ($user->email != $getmail) {
                $user->email = $request->input('email');
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
                $user->updated_at = now();
                $user->save();
                return redirect()->route('front.users.edit', $user)->with('message', 'Profil modifié avec succès! Un email de validation viens d\' envoyé.');
            } elseif ($user->isDirty()) {
                //Insertion IMAGE
                if (request('imagechoisie') != null) {
                    $avatar = request('imagechoisie');

                    $source = public_path('front/images/avatars/' . $avatar);
                    $filename = date('Y-m-d-m-s') . '_userID_' . $user->id . '_' . $avatar;
                    $destination = 'front/images/uploads/' . $filename;

                    if (\File::copy($source, $destination)) {
                        $user->image_profil = $destination;
                    }
                }
                $user->updated_at = now();
                $user->save();

                return redirect()->route('front.users.edit', $user)->with('message', 'Profil mis à jour !');
            } elseif (!$user->isDirty()) {
                return redirect()->route('front.users.edit', $user)->with('unchange', 'Aucune information changée...');
            }
        }
    }
    public function email_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'captcha' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        //Récupération de l'id de l'utilisateur
        $user = User::find($id);
        \LogActivity::addToLog('Utilisateur - Modification email');
        if ($user->email_verified_at == null) {

            $getmail = $request->input('email');

            if ($user->email != $getmail) {
                $user->email = $request->input('email');
                $user->sendEmailVerificationNotification();
                $user->updated_at = now();
                $user->save();
                return redirect()->route('front.users.edit', $user)->with('message', 'Nouvelle adresse enregistrée! Un email de validation viens de t\'etre envoyé.');
            } elseif ($user->email == $getmail) {
                $user->sendEmailVerificationNotification();
                $user->updated_at = now();
                $user->save();
                return redirect()->route('front.users.edit', $user)->with('message', 'Un email de validation viens de t\'etre envoyé.');
            }
        } else {
            return redirect()->route('front.users.edit', $user)->with('unchange', 'Aucune information changée...');
        }
    }


    //Gestion du questionnaire
    public function startQuestionnaire()
    {
        $user = auth::user();
        \LogActivity::addToLog('Utilisateur - Démarrage questionnaire');
        $part = QuestionnairePart::orderBy('position', 'ASC')->get();
        $question = QuestionnaireQuestion::orderBy('position', 'ASC')->get();
        $counterep = 0;
        $conterpart = 0;
        if ($user->qreponses->count() != 0) {
            foreach ($part as $partie) {
                $counterep = 0;
                foreach ($partie->questions as $question) {
                    foreach ($question->reponses as $rep) {
                        if ($rep->user_id == $user->id) {
                            $counterep++;
                        }
                    }
                }
                if ($partie->questions->count() == $counterep) {
                    $conterpart++;
                }
            }
        }
        return view("front.questionnaire.question")->with("user", $user)
            ->with("question", $question)
            ->with("part", $part)
            ->with("startInt", $conterpart);
    }

    public function indexQuestionnaire()
    {
        $user = auth::user();
        $part = QuestionnairePart::all();
        $question = QuestionnaireQuestion::all();
        return view("front.questionnaire.index")->with("user", $user)
            ->with("question", $question)
            ->with("part", $part);
    }

    public function questions()
    {
        //Verification des champs
        $parts = QuestionnairePart::all();
        $questions = QuestionnaireQuestion::all();

        return response()->json(['questions' => $questions, 'parts' => $parts]);
    }

    public function end_question()
    {
        $user = auth::user();
        $part = QuestionnairePart::all();
        $question = QuestionnaireQuestion::all();
        return view("front.questionnaire.index")->with("user", $user)
            ->with("question", $question)
            ->with("part", $part);
    }

    public function response_store(Request $request)
    {
        $user = auth::user();
        for ($i = 0; $i < $request->len; $i++) {
            $reponse = new QuestionnaireReponse;
            $reponse->reponse = $request->rep[$i];
            $reponse->questionnaire_question_id = $request->question[$i];
            $reponse->user_id = $user->id;
            $reponse->save();
            dump($reponse);
        }
dd("dfs");
        return response()->json(['parts' => $request]);
    }

    //Fin gestion Questionnaire


    public function forum()
    {
        return view("front.forum.index");
    }

    public function forum_mes_sujets()
    {
        return view("front.forum.mes_sujets");
    }

    // Conversation

    public function ajaxRequest1()
    {
        $user = auth::user();
        $users = user::all();
        return view('front.chat.index')->with('user', $user)
            ->with('users', $users);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestConvt(Request $request)
    {
        $user = auth::user();
        $id = $request->id;
        foreach ($user->conversation as $conversation) {
            foreach ($conversation->users as $utilisateur) {
                if ($utilisateur->id == $id) {
                    return response()->json(['conv' => $conversation]);
                }
            }
        }
        $conv = new Conversation;
        $conv->is_open = true;
        $conv->save();
        $conv->users()->attach($user);
        $conv->users()->attach(User::find($id));
        return response()->json(['conv' => $conv]);
    }

    public function ajaxRequestPost(Request $request)
    {
        //Verification des champs
        $request->validate([
            'message' => 'required|max:255',
            'conversation_id' => 'required',
        ]);

        $user = auth::user();

        $msg = new message;
        $msg->message = $request->message;
        $msg->sender = $user->id;
        $msg->conversation_id = $request->conversation_id;
        $msg->save();

        $conversation = conversation::find($request->conversation_id);
        $destinataire = "dd";
        foreach ($conversation->users as $user) {
            if ($user->id != auth::user()->id) {
                if ($user->statut == "eleve") {
                    $destinataire = $user->eleve;
                } else {
                    $destinataire = $user->admin;
                }
            }
        }

        return response()->json(['messages' => $conversation->messages, 'conversation_user' => $conversation->users, 'conversation' => $conversation, 'destinataire' => $destinataire]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestSync(Request $request)
    {
        $userloged = auth::user();
        $conversation = conversation::find($request->id);
        foreach ($conversation->messages as $mess) {
            if ($mess->sender != $userloged->id) {
                $mess->is_open = 1;
                $mess->save();
            }
        }
        foreach ($conversation->users as $user) {
            if ($user->id != $userloged->id) {
                if ($user->statut == "eleve") {
                    $destinataire = $user->eleve;
                } else {
                    $destinataire = $user->admin;
                }
            }
        }

        return response()->json(['messages' => $conversation->messages, 'conversation_user' => $conversation->users, 'conversation' => $conversation, 'destinataire' => $destinataire]);
    }

    public function ajaxRequestReaded()
    {
        $user = auth::user();
        $nb_message = 0;
        $destinataire = [];
        foreach ($user->conversation as $conv) {
            $counter = 0;
            foreach ($conv->messages as $mess) {
                if ($mess->sender != $user->id) {
                    if ($mess->is_open != true) {
                        $counter++;
                        $nb_message++;
                    }
                }
            }
            if ($counter != 0) {
                $conv->is_open = false;
                foreach ($conv->users as $usr) {
                    if ($usr->id != $user->id) {
                        $array = array(
                            "id" => $usr->id,
                            "nb_msg" => $counter,
                        );
                        $destinataire[] = $array;
                    }
                }
            } else {
                $conv->is_open = true;
            }
            $conv->save();
        }
        return response()->json(['conv' => $user->conversation, 'nb_message' => $nb_message, 'dest' => $destinataire]);
    }
}
