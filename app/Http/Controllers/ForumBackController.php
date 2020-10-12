<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sujet;
use App\Section;
use App\SujetCategorie;

class ForumBackController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $sujet = Sujet::all();
        return view('back/forum.index', compact('sections', 'sujet'));
    }
    public function create()
    {
        return view('back.forum.create');
    }
    public function show(Sujet $sujet)
    {
        return view('front/forum.show', compact('sujet'));
    }
    public function edit($id)
    {
        $section = Section::find($id);
        return view('back.forum.edit',  compact('section'));
    }
    public function edit_categorie($id)
    {
        $categorie = SujetCategorie::find($id);
        return view('back.forum.edit',  compact('categorie'));
    }
    public function store(Request $request)
    {
        $section = new Section;

        $section->titre = $request->get('section');
        $section->description = $request->get('description');
        $section->save();

        return redirect()->route('forum.index')->withStatus(__('Section créée avec succès.'));
    }
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $section->titre = $request->get('section');
        $section->description = $request->get('description');

        $section->update();
        return redirect()->route("forum.index")->with('success', 'Mise à jour réussite !');
    }
    public function destroy($id)
    {
        $section = Section::find($id);

        $section->delete();
        return redirect()->route('forum.index')->withStatus(__('Section supprimée avec succès'));
    }
    public function destroy_sujet($id)
    {
        $categorie = SujetCategorie::find($id);

        $categorie->delete();
        return redirect()->route('forum.index')->withStatus(__('Catégorie supprimée avec succès'));
    }
}
