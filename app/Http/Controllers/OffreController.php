<?php

namespace App\Http\Controllers;
use App\Offre;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Mail;
use Session;

class OffreController extends Controller
{
  public function index()
  {
    $offre = Offre::all();
    return view('back/offre.index', compact('offre'));

  }
  public function create(Offre $offre)
  {
    return view('back/offre.create',  compact('offre'));
  }

  /**
  * Création d'une offre
  *
  * @param  \App\Offre  $offre
  * @return \Illuminate\View\View
  */
  public function store(Request $request)
  {
    // On oblige à respecter certains critères avant de valider la requête
    $validator = Validator::make($request->all(), [
      'titre' => 'required|max:255',
      'niveau' => 'required|max:15',
    ]);
    // Si la validation échoue
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator->errors());
    }
    $offre = new Offre;
    $pdf_upload = $request->file('fileUpload');
    $rand = Str::random(10);
    if(($pdf_upload != NULL) ){
      $pdf_nommage = date('Y-m-d') . '-' . $rand .'-'. $pdf_upload->getClientOriginalName();
      $pdf_get = 'pdf/' . $pdf_nommage;
      if (($pdf_upload->move('pdf', $pdf_nommage))) {
        $offre->pdf = $pdf_get;
      }
    }
    $offre->titre = $request->get('titre');
    $offre->description = $request->get('description');
    $offre->niveau = $request->get('niveau');
    $offre->lieu = $request->get('lieu');
    $offre->entreprise = $request->get('entreprise');
    $offre->type = $request->get('type');
    $offre->created_at = now();
    $offre->nb_vue = 0;
    $offre->save();

    return redirect()->route('offre.index')->withStatus(__('Offre créée avec succès.'));
  }

  public function show(Offre $offre)
  {
    return view('back/offre.show', compact('offre'));
  }

  public function edit(Offre $offre)
  {
    return view('back/offre.edit', compact('offre'));
  }

  public function update(Request $request, Offre $offre)
  {
    $pdf_upload = $request->file('fileUpload');
    $rand = Str::random(10);
    if(($pdf_upload != NULL) ){
      $pdf_nommage = date('Y-m-d') . '-' . $rand .'-'. $pdf_upload->getClientOriginalName();
      $pdf_get = 'pdf/' . $pdf_nommage;
      if (($pdf_upload->move('pdf', $pdf_nommage))) {
        $offre->pdf = $pdf_get;
      }
    }
    $offre->titre = $request->get('titre');
    $offre->description = $request->get('description');
    $offre->niveau = $request->get('niveau');
    $offre->lieu = $request->get('lieu');
    $offre->entreprise = $request->get('entreprise');
    $offre->type = $request->get('type');
    $offre->update();
    return redirect()->route("offre.index")->with('success','Mise à jour réussite !');
  }

  public function destroy(Offre $offre)
  {
    if(isset($offre->pdf)){
      unlink(public_path($offre->pdf));
    }
    $offre->delete();
    return redirect()->route('offre.index')->withStatus(__('Offre supprimée avec succès'));    }
  }
