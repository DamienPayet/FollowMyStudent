<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;
use \Validator;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Redirect;

class OffreFrontController extends Controller
{
  public function index()
  {
    \LogActivity::addToLog('Utilisateur - Affichage offre');

    $offres = Offre::paginate(6);
    $pop_offres = Offre::orderBy('nb_vue', 'desc')->take(3)->get();
    $nonval_offres = DB::table('offres')->where('valide', '=', 0)->count();
    //dd( $nonval_offres);
    return view('front/offre.index', compact('offres', 'pop_offres', 'nonval_offres'));
  }
  public function create(Offre $offre)
  {
    return view('front/offre.create',  compact('offre'));
  }

  public function show(Request $request, $id)
  {
    $offre = Offre::find($id);
    \LogActivity::addToLog('Utilisateur - Affichage détails offre');

    if (Auth::user()->statut == "eleve" && $offre->valide == 0) {
      //return redirect()->route('offre_front_index')->with('error', 'Accès refusé');
      return redirect()->route('offre_front_index')->withErrors(['Erreur', 'Accès refusé']);
    }

    $offre->nb_vue += 1;
    $offre->update();
    $nonval_offres1 = DB::table('offres')->whereIn('valide', $offre)->get('valide');
    //$nonval_offres = DB::table('offres')->where('valide', 0)->value('valide');
    // dd( $offre->valide);
    /*if($offre->valide == '0'){
      dd('val 0');
    }else{
      dd('val 1');
    }*/
    return view('front/offre.show', compact('offre'));
  }
  public function store(Request $request)
  {
    // On oblige à respecter certains critères avant de valider la requête
    $validator = Validator::make($request->all(), [
      'titre' => 'required|max:80',
      'description' => 'required|min:30|max:10000',
      'niveau' => 'required',
      'type' => 'required',
      'lieu' => 'required',
      'entreprise' => 'required|max:30',
      'fileUpload' => 'nullable|file|mimes:pdf|max:size:5000',
      'captcha' => 'required|captcha',
    ]);
    // Si la validation échoue
    if ($validator->fails()) {
      return back()->withInput()->withErrors($validator->errors());
    }
    $offre = new Offre;
    \LogActivity::addToLog('Utilisateur - Création offre');
    $pdf_upload = $request->file('fileUpload');
    $rand = Str::random(10);
    if (($pdf_upload != NULL)) {
      $pdf_nommage = date('Y-m-d') . '-' . $rand . '-' . $pdf_upload->getClientOriginalName();
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
    $offre->user_id = Auth::user()->id;
    if (Auth::user()->statut == "admin") {
      $offre->valide = 1;
      $offre->save();

      return redirect()->route('offre_front_index')->with('success', 'Offre validée avec succès');
    } else {
      $offre->save();
      return redirect()->route('offre_front_index')->with('success', 'Offre soumise à modération. Elle sera validée prochainement');
    }
    // return redirect()->route('offre_front_index')->withStatus(__('Offre soumise à modération. Elle sera validée prochainement'));
  }
}
