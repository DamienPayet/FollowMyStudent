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


class ForumController extends Controller
{
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
  public function show_sujet(Sujet $sujet)
  {
    $reponses = SujetReponse::where('sujet_id', $sujet->id)->get();
    $nbReponse = SujetReponse::where('sujet_id', $sujet->id)->count();
    $users=User::all();
    $sujet->nb_vue += 1;
    $sujet->update();
    return view('front/forum.show', compact('sujet','reponses','nbReponse','users'));
  }
  public function store_reponse(Request $request, $sujet)
  {
    // On oblige à respecter certains critères avant de valider la requête
    $validator = Validator::make($request->all(), [
      'reponse' => 'required|min:10',
    ]);
    // Si la validation échoue
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator->errors());
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

    $reponse->reponse = $request->get('reponse');
    $reponse->user_id = $user;
    $reponse->sujet_id = $sujet;
    $reponse->nb_vue = 0;
    $reponse->created_at = now();
    $reponse->save();
    public function index_sujet($id)
    {
        $sujets = Sujet::all();
        $categorie = SujetCategorie::find($id);
        $categorie->nb_vue += 1;
        $categorie->update();
        $users = User::all();
        return view('front/forum.index_sujet', compact('sujets', 'categorie', 'users'));
    }

    return redirect()->route('sujet.show', $sujet)->withStatus(__('Réponse créée avec succès.'));
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

  public function create()
  {
    $section = Section::all();
    $categorie = SujetCategorie::all();
    public function show_sujet(Sujet $sujet)
    {
        $reponses = SujetReponse::where('sujet_id', $sujet->id)->get();
        $nbReponse = SujetReponse::count('sujet_id', $sujet->id);
        $users = User::all();
        $sujet->nb_vue += 1;
        $sujet->update();
        return view('front/forum.show', compact('sujet', 'reponses', 'nbReponse', 'users'));
    }

    public function store_reponse(Request $request, $sujet)
    {
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

        $reponse->reponse = $request->get('reponse');
        $reponse->users()->attach($user);
        $reponse->sujet_id = $sujet;
        $reponse->nb_vue = 0;
        $reponse->created_at = now();
        $reponse->save();

        return redirect()->route('sujet.show', $sujet)->withStatus(__('Réponse créée avec succès.'));
    }

    public function create()
    {
        $section = Section::all();
        $categorie = SujetCategorie::all();

        return view('front.forum.create_sujet', compact('categorie', 'section'));
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
        $sujet = new Sujet;

        $sujet->titre = $request->get('titre');
        $sujet->description = $request->get('description');
        $sujet->categorie_id = $request->get('categorie');
        $sujet->user_id = Auth::user()->id;
        $sujet->nb_vue += 1;
        $sujet->type = $request->get('type');
        $sujet->created_at = now();
        $sujet->save();

        return redirect()->route('forum')->withStatus(__('Sujet créé avec succès.'));
    }

    public function searching(Request $request)
    {
        $sujets = Sujet::where('description' ,'like' , '%'.$request->message.'%')->get();
        return response()->json(['msg' =>  $sujets]);
    }
}
