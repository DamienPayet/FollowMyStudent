<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sujet;
use App\Section;
use App\SujetCategorie;
use App\SujetReponse;
use App\User;
use Image;

class ForumBackController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $sujets = Sujet::all();
        $categories = SujetCategorie::all();
        return view('back/forum.index', compact('sections', 'categories', 'sujets'));
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
    public function store(Request $request)
    {
        $section = new Section;

        $section->titre = $request->get('section');
        $section->description = $request->get('description');
        $section->nb_vue = 0;
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


    // COMMENTAIRES 
    public function index_commentaire()
    {
        $commentaires = SujetReponse::all();

        return view('back.forum.commentaire.index', compact('commentaires'));
    }
    public function edit_commentaire($id)
    {
        $commentaire = SujetReponse::find($id);
        return view('back.forum/commentaire/edit',  compact('commentaire'));
    }

    public function update_commentaire(Request $request, $id)
    {
        $commentaire = SujetReponse::find($id);
        $commentaire->reponse = $request->get('reponse');

        $commentaire->update();
        return redirect()->route("commentaire.index")->with('success', 'Commentaire mis à jour !');
    }

    public function destroy_commentaire($id)
    {
        $commentaire = SujetReponse::find($id);

        $commentaire->delete();
        return redirect()->route('commentaire.index')->withStatus(__('Commentaire supprimé avec succès'));
    }


    // CATEGORIE

    public function create_categorie($id)
    {
        $section = Section::find($id);
        return view('back.forum.create_categorie', compact('section'));
    }
    public function edit_categorie($id)
    {
        $categorie = SujetCategorie::find($id);
        return view('back.forum.edit_categorie',  compact('categorie'));
    }

    public function store_categorie(Request $request)
    {
        $categorie = new SujetCategorie();

        $categorie->nom = $request->get('nom');
        $categorie->section_id = $request->get('id_section');

        if ($request->file('image') == null) {
            $categorie->image = 'front/images/categories/contact-us.png';
        } else {
            $image = $request->file('image');
            $filename = 'front/images/categories/' . $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save(public_path($filename));
            $categorie->image = $filename;
        }
        $categorie->nb_vue = 0;

        $categorie->save();

        return redirect()->route('forum.index')->withStatus(__('Catégorie créée avec succès.'));
    }

    public function update_categorie(Request $request, $id)
    {
        $categorie = SujetCategorie::find($id);
        $categorie->nom = $request->get('nom');
        //Insertion IMAGE
        if ($request->file('image') == null) {
        } else {
            $image = $request->file('image');
            $filename = 'front/images/categories/' . $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save(public_path($filename));
            $categorie->image = $filename;
        }
        $categorie->update();
        return redirect()->route("forum.index")->with('success', 'Catégorie mise à jour !');
    }

    public function destroy_categorie($id)
    {
        $categorie = SujetCategorie::find($id);

        $categorie->delete();
        return redirect()->route('forum.index')->withStatus(__('Catégorie supprimée avec succès'));
    }
    // SUJET
    public function destroy_sujet($id)
    {
        $sujet = Sujet::find($id);

        $sujet->delete();
        return redirect()->route('forum.index')->withStatus(__('Sujet supprimé avec succès'));
    }
}
