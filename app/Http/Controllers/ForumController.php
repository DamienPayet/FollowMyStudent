<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use \Validator;
use App\Sujet;
use App\Section;
use App\SujetCategorie;
use App\User;
use App\SujetReponse;
use App\Like;
use Symfony\Component\Console\Input\Input;
use ConsoleTVs\Profanity\Facades\Profanity;


class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('email');
    }
    public function index()
    {
        $section = Section::all();
        $sujets = Sujet::latest()->take(3)->get();
        $categories = SujetCategorie::latest()->take(3)->get();
        //$a = $section->categories()->paginate();
        //$pg_categories = SujetCategorie::paginate(8);
        //dd($pg_categories);
        return view('front/forum.index', compact('section', 'sujets', 'categories'));
    }
    public function index_sujet($id)
    {
        $sujets = Sujet::all();
        $categorie = SujetCategorie::find($id);
        $categorie->nb_vue += 1;
        $categorie->update();
        $users = User::all();
        return view('front/forum.index_sujet', compact('sujets', 'categorie', 'users'));
    }
    public function sujet_resolution($id)
    {
        $sujet = Sujet::find($id);

        \LogActivity::addToLog('User - Résolution sujet');

        $sujet->resolue = !$sujet->resolue;
        $sujet->update();
        return redirect()->route('forum')->with('success', 'Sujet résolu !');
    }
    public function forum_messujets($id)
    {
        $user = User::find($id);
        $sujets = Sujet::all();

        return view('front.forum.mes_sujets', compact('sujets', 'user'));
    }
    public function show_sujet(Sujet $sujet)
    {
        $reponses = SujetReponse::where('sujet_id', $sujet->id)->get();
        $nbReponse = SujetReponse::where('sujet_id', $sujet->id)->count();
        $users = User::all();
        $sujet->nb_vue += 1;
        $sujet->update();
        return view('front/forum.show', compact('sujet', 'reponses', 'nbReponse', 'users'));
    }
    public function edit_sujet($id)
    {
        $sujet = Sujet::find($id);
        $categorie = SujetCategorie::all();
        if (Auth::user()->id == $sujet->user_id || Auth::user()->statut == "admin" ) {
            return view('front.forum.edit_sujet', compact('sujet', 'categorie'));
        } else {
            return redirect()->route('forum')->withErrors(['Accès refusé']);
        }
    }

    public function update_sujet(Request $request, Sujet $sujet)
    {
        //
        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'titre' => 'required|min:10|max:255',
            'description' => 'required|min:15',
            'captcha' => 'required',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $s = Sujet::find($sujet->id);

        $bad_words_sujet = $request->get('titre');
        $bad_words_message = $request->get('description');

        $s->titre = Profanity::blocker($bad_words_sujet)->filter();
        $s->description = Profanity::blocker($bad_words_message)->filter();

        //$s->titre = $request->get('titre');
        //$s->description = $request->get('description');
        $s->categorie_id = $request->get('categorie');
        $s->user_id = Auth::user()->id;
        $s->updated_at = now();
        $s->save();

        return redirect()->route('sujet.show', $s)->withStatus(__('Sujet créé avec succès.'));
    }

    public function update_reponse(Request $request, $reponse)
    {
        $maReponse = SujetReponse::find($reponse);
        $maReponse->reponse = $request->reponse;
        $maReponse->updated_at = now();
        $maReponse->save();
        return response()->json(["success" => "Modification réussite !"]);
    }

    public function store_reponse(Request $request, $sujet)
    {
        \LogActivity::addToLog('User - Ajout réponse sujet');

        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'reponse' => 'required|min:10',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $user = auth()->user()->id;
        $reponse = new SujetReponse;

        $bad_words_sujet = $request->get('reponse');

        $reponse->reponse = Profanity::blocker($bad_words_sujet)->filter();

        // $reponse->reponse = $request->get('reponse');
        $reponse->user_id = $user;
        $reponse->sujet_id = $sujet;
        $reponse->nb_vue = 0;
        $reponse->save();

        return redirect()->route('sujet.show', $sujet)->withStatus(__('Réponse créée avec succès.'));
    }

    public function create()
    {
        $section = Section::all();
        $categorie = SujetCategorie::all();
        \LogActivity::addToLog('User - Vue création sujet');

        return view('front.forum.create_sujet', compact('categorie', 'section'));
    }



    public function like(): JsonResponse
    {
        $reponse = SujetReponse::find(request()->id);

        if ($reponse->isLikedByLoggedInUser()) {
            $res = Like::where([
                'user_id' => auth()->user()->id,
                'sujet_reponse_id' => request()->id
            ])->delete();

            if ($res) {
                return response()->json([
                    'count' => SujetReponse::find(request()->id)->likes->count()
                ]);
            }
        } else {
            $like = new Like();

            $like->user_id = auth()->user()->id;
            $like->sujet_reponse_id = request()->id;

            $like->save();

            return response()->json([
                'count' => SujetReponse::find(request()->id)->likes->count()
            ]);
        }
    }

    public function store(Request $request)
    {
        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'titre' => 'required|min:10|max:255',
            'description' => 'required|min:15',
            'captcha' => 'required|captcha',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        \LogActivity::addToLog('User - Création sujet');

        $sujet = new Sujet;
        $bad_words_sujet = $request->get('titre');
        $bad_words_message = $request->get('description');

        $sujet->titre = Profanity::blocker($bad_words_sujet)->filter();
        $sujet->description = Profanity::blocker($bad_words_message)->filter();

        //$sujet->titre = $request->get('titre');
        //$sujet->description = $request->get('description');
        $sujet->categorie_id = $request->get('categorie');
        $sujet->user_id = Auth::user()->id;
        $sujet->nb_vue += 1;
        $sujet->type = $request->get('type');
        $sujet->created_at = now();
        $sujet->save();
        return redirect()->route('forum')->with('success', 'Sujet créé  avec succès');

        //  return redirect()->route('forum')->withStatus(__('Sujet créé avec succès.'));
    }

    public function searching(Request $request)
    {
        \LogActivity::addToLog('User - Recherche sujet');

        $sujets = Sujet::where('description', 'like', '%' . $request->message . '%')->get();
        return response()->json(['msg' =>  $sujets]);
    }
}
