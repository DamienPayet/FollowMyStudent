<?php

namespace App\Http\Controllers;
use App\Offre;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\UploadedFile;
use Mail;
use Session;

class OffreController extends Controller
{
    public function index()
    {
        $offre = Offre::all();
        // $offre = Offre::paginate(5);

        //Ajouter dans blade {{ $offre->onEachSide(5)->links() }}

        //return view('offres.index', compact('offre'));
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
            //'fileUpload' => 'required|max:204800',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $offre = new Offre;
        // On stock le fichier sélectionné
        //$pdf_upload = $request->file('fileUpload');
        // Définition du chemin de stockage
       // $pdf_destination = public_path() . '\uploads\\';
        // Nommage du fichier
       // $pdf_nommage = date('Y-m-d') . ' - ' . $pdf_upload->getClientOriginalName();
        // On indique le chemin du fichier pour la base de donnée
       // $pdf_get = '\uploads\\' . $pdf_nommage;
        // Si il y a bien un fichier, on le déplace dans le répertoire et on stock le chemin dans la base de donnée        
      /*  if ($pdf_upload) {
            if ($pdf_upload->move($pdf_destination, $pdf_nommage)) {
                $offre->pdf = $pdf_get;
            }
        } else {
            return redirect()->route('offre.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
        }*/
        $offre->titre = $request->get('titre');
        $offre->description = $request->get('description');
        $offre->niveau = $request->get('niveau');
        $offre->lieu = $request->get('lieu');
        $offre->entreprise = $request->get('entreprise');
        $offre->created_at = now();
        $offre->save();
        $offre_id = $offre->id;

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
        // On stock le fichier sélectionné 
        $pdf_upload = $request->file('fileUpload');
        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'niveau' => 'required|max:15',
            'description' => 'required'
        ]);
        //dd($offre);

        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        //Si il y a un fichier
        if ($pdf_upload) {
            // Définition du chemin de stockage
            $pdf_destination = public_path() . '\uploads\\';
            // Nommage du fichier
            $pdf_nommage = date('Y-m-d') . ' - ' . $pdf_upload->getClientOriginalName();
            // On indique le chemin du fichier pour la base de donnée
            $pdf_get = '\uploads\\' . $pdf_nommage;
            // Récupération du chemin de l'ancien fichier 

            $pdf_path_remplace = public_path() . $offre->pdf;

            if ($pdf_upload) {
                // Si le fichier existe, on le supprime
                if (File::exists($pdf_path_remplace)) {
                    unlink($pdf_path_remplace);
                }
                if ($pdf_upload->move($pdf_destination, $pdf_nommage)) {

                    $offre->titre = $request->get('titre');
                    $offre->description = $request->get('description');
                    $offre->niveau = $request->get('niveau');
                    $offre->pdf = $pdf_get;
                    $offre->updated_at = now();
                    $offre->save();
                }
            } else {
                return redirect()->route('offre.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
            }
        } else {

            //dd($offre);
            $offre->update($request->all());
        }
        //  dd($offre);
        return redirect()->route('offre.index')->withStatus(__('Offre mise à jour avec succès'));
    }
    public function destroy(Offre $offre)
    {
      
        $offre->delete();
       
        return redirect()->route('offre.index')->withStatus(__('Offre supprimée avec succès'));    }
   
}
