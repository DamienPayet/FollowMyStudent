<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    return view('front/forum.index', compact('section', 'sujets','categories'));
  }
  public function index_sujet($id)
  {
    $sujets = Sujet::all();
    $categorie = SujetCategorie::find($id);
    $user = User::all();

    return view('front/forum.index_sujet', compact('sujets','categorie','users'));
  }
  public function show_sujet(Sujet $sujet)
  {
    return view('front/forum.show', compact('sujet'));
  }
  public function create()
  {
    $categorie = SujetCategorie::all();
    return view('front.forum.create_sujet', compact('categorie'));
  }

  public function store(Request $request)
  {
    // On oblige à respecter certains critères avant de valider la requête
    $validator = Validator::make($request->all(), [
      'titre' => 'required|max:255',
    ]);
    // Si la validation échoue
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator->errors());
    }
    $sujet = new Sujet;

    $sujet->titre = $request->get('titre');
    $sujet->description = $request->get('description');
    $sujet->categorie_id = $request->get('categorie');
    $sujet->type = $request->get('type');
    $sujet->created_at = now();
    $sujet->nbVue = 0;
    $sujet->save();

    return redirect()->route('forum')->withStatus(__('Sujet créé avec succès.'));
  }
}
