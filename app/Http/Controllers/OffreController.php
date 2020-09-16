<?php

namespace App\Http\Controllers;
use App\Offre;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\UploadedFile;
use Mail;
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
    public function create()
    {

        return view('back/offres.create');
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
            'fileUpload' => 'required|max:204800',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $offre = new Offre;
        // On stock le fichier sélectionné
        $pdf_upload = $request->file('fileUpload');
        // Définition du chemin de stockage
        $pdf_destination = public_path() . '\uploads\\';
        // Nommage du fichier
        $pdf_nommage = date('Y-m-d') . ' - ' . $pdf_upload->getClientOriginalName();
        // On indique le chemin du fichier pour la base de donnée
        $pdf_get = '\uploads\\' . $pdf_nommage;
        // Si il y a bien un fichier, on le déplace dans le répertoire et on stock le chemin dans la base de donnée        
        if ($pdf_upload) {
            if ($pdf_upload->move($pdf_destination, $pdf_nommage)) {
                $offre->pdf = $pdf_get;
            }
        } else {
            return redirect()->route('back/offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
        }
        $offre->titre = $request->get('titre');
        $offre->description = $request->get('description');
        $offre->niveau = $request->get('niveau');
        $offre->created_at = now();
        $offre->entreprise_id = $request->entreprise;
        $offre->save();
        $offre_id = $offre->id;

        $mailuserget = DB::table('users')->select('email')->whereNotNull('email')->pluck('email');
        foreach ($mailuserget as $mailuser) {
            //return view('mail', compact('offre'));
            $data = array('offre' => $offre_id);
            Mail::send('mailnewoffre', $data, function ($message) use ($mailuser, $offre) {
                $message->to($mailuser)
                    ->subject('Nouvelle offre d\'emplois disponible');
                $message->from('tplaravel284@gmail.com', 'Careers - Lycée Pasteur Mond Roland');
            });
        }

        return redirect()->route('back/offre.index')->withStatus(__('Offre créée avec succès. Un mail a été envoyé à l\'ensemble des utilisateurs.'));
    }
    public function show(Offre $offre)
    {
        return view('back/offre.show', compact('offre'));
    }
}
