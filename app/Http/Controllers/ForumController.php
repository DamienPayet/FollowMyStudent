<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Validator;
use App\Sujet;
use App\Section;
use App\SujetCategorie;
use App\User;

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
    $sujet->nb_vue += 1;
    $sujet->update();
    return view('front/forum.show', compact('sujet'));
  }
  public function create()
  {
    $section = Section::all();
    $categorie = SujetCategorie::all();

    return view('front.forum.create_sujet', compact('categorie','section'));
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
    $sujet->nbVue = 0;
    $sujet->save();

    return redirect()->route('forum')->withStatus(__('Sujet créé avec succès.'));
  }
}
