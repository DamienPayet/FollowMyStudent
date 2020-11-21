<?php

namespace App\Http\Controllers;

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

class StudentFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user, Request $request)
    {
        $user = Auth::user();
        //$page = (int) $request->input('page') ?: 2;
        //$images = \File::allFiles(public_path('front\images\avatars'));
        //$images = collect(\File::allFiles(public_path('/front/images/avatars/')));
        //dd($images);
        //$onPage = 15;

        //$slice = $images->slice(($page-1)* $onPage, $onPage);

        // $paginator = new \Illuminate\Pagination\LengthAwarePaginator($slice, $images->count(), $onPage);

        // return view('front.user.edit', compact('user'))->with('images', $paginator);

        $images = \File::allFiles(public_path('front\images\avatars'));
        return view('front.user.edit', compact('user', 'images'));
    }

    public function show(User $user)
    {
        $user = Auth::user();
        return view('front.user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6'
        ]);
        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);

        $user->email = $request->input('email');

        if ($request->input('password') != null && $request->input('password_confirmation') != null ) {
            $user->password = bcrypt($request->input('password'));
        }
        //Insertion IMAGE
        if ($request->file('av_image') != null) {
            $avatar = $request->file('av_image');
            $filename = 'front/images/uploads/' . date('Y-m-d-m-s') .  '_userID_' . $user->id . '_' . $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300, 300)->save(public_path($filename));
            $user->image_profil = $filename;
        } elseif (request('imagechoisie') != null) {
            $avatar = request('imagechoisie');

            $source = public_path('front/images/avatars/' . $avatar);
            $filename = date('Y-m-d-m-s') .  '_userID_' . $user->id . '_' . $avatar;
            $destination = 'front/images/uploads/' . $filename;

            if (\File::copy($source, $destination)) {
                $user->image_profil = $destination;
            }
        }
        //
        //dd($user);
        $user->updated_at = now();

        $user->save();
        return redirect()->back()->with('message', 'Profil modifié avec succès!');
    }

    public function questionnaire()
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

    public function response_store(Request $request)
    {
        $user = auth::user();
        foreach ($request->tab as $value) {
            $reponse = new QuestionnaireReponse;
            $reponse->reponse = $value[1];
            $reponse->questionnaire_question_id = $value[0];
            $reponse->user_id = $user->id;
            $reponse->save();
        }
        return response()->json(['parts' => $request->tab]);
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

    public function forum()
    {
        return view("front.forum.index");
    }

    public function forum_mes_sujets()
    {
        return view("front.forum.mes_sujets");
    }

    // Conversation
    public function ajaxRequest()
    {
        $user = auth::user();
        return view('front.chat.index')->with('user', $user);
    }

    public function ajaxRequest1()
    {
        $user = auth::user();
        $users = user::all();
        return view('front.chat.index2')->with('user', $user)
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

        $conversation = conversation::find($request->id);
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
}
