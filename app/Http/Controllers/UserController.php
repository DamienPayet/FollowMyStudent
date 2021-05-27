<?php

namespace App\Http\Controllers;

use App\AuditAction;
use App\Conversation;
use App\LogActivity;
use App\Offre;
use App\QuestionnairePart;
use App\QuestionnaireQuestion;
use App\QuestionnaireReponse;
use App\Sujet;
use App\SujetReponse;
use Illuminate\Http\Request;
use App\User;
use App\Eleve;
use App\Admin;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Compound;
use Validator;
use Image;
use Illuminate\Support\Facades\DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;

class UserController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
    }

    public function index()
    {
        \LogActivity::addToLog('Admin - Affichage utilisateurs');
        $user = User::all();
        $archived_users = DB::table('users')->where('archived', '=', 1)->count();

        return view('back.user.index', compact('user', 'archived_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = \File::allFiles(public_path('front/images/avatars'));
        return view('back.user.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'mdp' => 'required',
            'statut' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("users.create")->withErrors($validator)->withInput();
        }

        $user = new User;

        if ($request->input('statut') == "eleve") {
            $eleve = new Eleve;
            $eleve->nom = $request->input('nom');
            $eleve->prenom = $request->input('prenom');
            $eleve->save();
            $user->eleve_id = $eleve->id;
        } elseif ($request->input('statut') == "admin") {
            $admin = new Admin;
            $admin->nom = $request->input('nom');
            $admin->prenom = $request->input('prenom');
            $admin->save();
            $user->administrateur_id = $admin->id;
            $user->email_verified_at = now();
        }

        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('mdp'));
        $user->statut = $request->input('statut');
        //Insertion IMAGE
        if (request('imagechoisie') == null) {
            $user->image_profil = "images/default.png";
        } elseif (request('imagechoisie') != null) {

            $avatar = request('imagechoisie');
            $source = public_path('front/images/avatars/' . $avatar);
            $filename = date('Y-m-d-m-s') . '_userID_' . $user->id . '_' . $avatar;
            $destination = 'front/images/uploads/' . $filename;

            if (\File::copy($source, $destination)) {
                $user->image_profil = $destination;
            }
        }
        $user->save();

        $email = $request->get("email");
        $data = ([
            "nom" => $request->get("nom"),
            "prenom" => $request->get("prenom"),
            "email" => $request->get("email"),
            "password" => $request->input('mdp'),
        ]);
        \Mail::to($email)->send(new WelcomeMail($data));

        \LogActivity::addToLog('Admin - Création utilisateurs');
        return redirect()->route("users.index")->with('success', 'Création réussie !');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        \LogActivity::addToLog('Admin - Détail utilisateur');
        return view('back.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $images = \File::allFiles(public_path('front/images/avatars'));
        return view('back.user.edit', compact('user', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'same:password_confirmation',
            'statut' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("users.edit", $id)->withErrors($validator)->withInput();
        }


        if ($user->statut == "eleve") {
            $user->eleve->nom = $request->input('nom');
            $user->eleve->prenom = $request->input('prenom');
            $statut_change = $request->input('statut');
            if ($statut_change != $user->statut) {
                $admin = new Admin;
                //dd($user->eleve->id);
                $user->eleve_id = null;

                $admin->nom = $request->input('nom');
                $admin->prenom = $request->input('prenom');
                $admin->save();
                $user->statut = $request->input('statut');
                $user->administrateur_id = $admin->id;
                $user->email_verified_at = now();
                $user->save();
                Eleve::find($user->eleve->id)->delete();
            }
        } elseif ($user->statut == "admin") {
            $user->admin->nom = $request->input('nom');
            $user->admin->prenom = $request->input('prenom');

            $statut_change = $request->input('statut');
            if ($statut_change != $user->statut) {
                $eleve = new Eleve;

                $user->administrateur_id = null;
                $eleve->nom = $request->input('nom');
                $eleve->prenom = $request->input('prenom');
                $eleve->save();
                $user->statut = $request->input('statut');
                $user->eleve_id = $eleve->id;
                $user->email_verified_at = null;
                $user->save();
                Admin::find($user->admin->id)->delete();
            }
            $user->admin->save();
        }
        $getmail = $request->input('email');
        $user->email = $request->input('email');
        if ($user->email != $getmail) {
            $user->email = $request->input('email');
            $user->email_verified_at = null;
        }
        //$user->statut = $request->input('statut');
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }
        //Insertion IMAGE
        if (request('imagechoisie') != null) {

            $avatar = request('imagechoisie');
            $source = public_path('front/images/avatars/' . $avatar);
            $filename = date('Y-m-d-m-s') . '_userID_' . $user->id . '_' . $avatar;
            $destination = 'front/images/uploads/' . $filename;

            if (\File::copy($source, $destination)) {
                $user->image_profil = $destination;
            }
            /*
            $avatar = $request->file('image_profil');
            $filename = 'back/uploads/avatars/' . date('Y-m-d') . '_' . $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300, 300)->save(public_path($filename));
            $user->image_profil = $filename;*/
        }
        $user->updated_at = now();
        $user->save();
        \LogActivity::addToLog('Admin - Modifications utilisateur');

        return redirect()->route("users.index")->with('success', 'Modification réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $convs = Conversation::all();

        $this->deleteinfo_user($id);

        $user = User::find($id);

        if ($user->statut == "eleve") {
            $user->eleve->delete();
        } elseif ($user->statut == "admin") {
            $user->admin->delete();
        }

        $user->delete();
        foreach ($convs as $c) {
            if ($c->users->count() != 2) {
                $c->delete();
            }
        }
        \LogActivity::addToLog('Admin - Suppresion utilisateur');

        return redirect()->route("users.index")->with('error', 'Suppression réussie !');
    }

    private function deleteinfo_user($id)
    {
        $question_reps = QuestionnaireReponse::all()->where('user_id', $id);
        $sujets = Sujet::all()->where('user_id', $id);
        $sujet_reps = SujetReponse::all()->where('user_id', $id);
        $audits = LogActivity::all()->where('user_id', $id);
        $offres = Offre::all()->where('user_id', $id);
        foreach ($question_reps as $quest) {
            $quest->user_id = null;
            $quest->save();
        }
        foreach ($sujets as $sujet) {
            $sujet->user_id = null;
            $sujet->save();
        }
        foreach ($sujet_reps as $element) {
            $element->user_id = null;
            $element->save();
        }
        foreach ($audits as $element) {
            $element->user_id = null;
            $element->save();
        }
        foreach ($offres as $element) {
            $element->user_id = null;
            $element->save();
        }
    }

    public function deleteAll(Request $request)
    {
        $convs = Conversation::all();

        $ids = explode(",", $request->ids);
        foreach ($ids as $id) {
            $this->deleteinfo_user($id);
            $user = User::find($id);
            $user->delete();
            foreach ($convs as $c) {
                if ($c->users->count() != 2) {
                    $c->delete();
                }
            }
        }

        return response()->json(['success' => "Utilisateur(s) supprimé(s) avec succès."]);

        \LogActivity::addToLog('Admin - Suppresion utilisateurs');
    }


    public function avatar_index()
    {
        //
        $images = \File::allFiles(public_path('front/images/avatars'));
        \LogActivity::addToLog('Admin - Affichage avatars');
        return view('back.avatar.index', compact('images'));
    }

    public function avatar_create()
    {
        //
        return view('back.avatar.create');
    }

    public function avatar_show()
    {
        //
        $images = \File::allFiles(public_path('front/images/avatars'));
        \LogActivity::addToLog('Admin - Détails avatar');
        return view('back.avatar.index', compact('images'));
    }

    public function avatar_store(Request $request)
    {
        $avatar = $request->file('fileUpload');
        $filename = 'front/images/avatars/' . $avatar->getClientOriginalName();
        Image::make($avatar)->resize(300, 300)->save(public_path($filename));
        \LogActivity::addToLog('Admin - Création avatar');

        return redirect()->route("avatar.index")->with('success', 'Avatar ajouté !');
    }

    public function avatar_destroy($image)
    {
        //dd($image);

        $imagedel = public_path() . '/front/images/avatars/' . $image;
        //dd($imagedel);
        //    $image = 'front/images/avatars/' . $image->getFilename();
        if (\File::exists($imagedel)) {
            \File::delete($imagedel);
        } else {
            return redirect()->route("avatar.index")->with('error', 'Un problème est survenu..merci de réessayer');
        }
        \LogActivity::addToLog('Admin - Suppression avatar');

        return redirect()->route("avatar.index")->with('success', 'Avatar supprimé !');
    }

    public function avatar_deleteAll(Request $request)
    {
        $ids = $request->ids;

        $ids = explode(",", $ids);

        foreach ($ids as $id) {
            \File::delete(public_path() . '/front/images/avatars/' . $id);
        }
        \LogActivity::addToLog('Admin - Suppression multiples avatars');
        return response()->json(['success' => "Avatars supprimés avec succès."]);
    }

    public function index_archive()
    {
        \LogActivity::addToLog('Admin - Affichage utilisateurs archivés');
        $users = User::all();
        $archived_users = DB::table('users')->where('archived', '=', 1)->count();

        return view('back.user.archive', compact('users', 'archived_users'));
    }

    public function archiver(Request $request, $id)
    {
        $user = User::find($id);
        \LogActivity::addToLog('Admin - Archivage utilisateur');
        if ($user->archived == 0) {
            $user->archived = 1;
            $user->archived_at = now();
            $user->password = bcrypt(Str::random(16));
            $user->email_verified_at = null;
            $user->password_change_at = null;

            $user->update();
            return redirect()->route('archive.index')->withStatus(__('Utilisateur archivé!'));
        } elseif ($user->archived == 1) {
            $user->archived = 0;
            $user->archived_at = null;
            $user->update();

            $token = Str::random(60);
            $resetpassword = $user;
            $resetpassword->sendPasswordResetNotification($token);

            return redirect()->route('users.index')->withStatus(__('Utilisateur réactivé! Un email lui a été envoyer afin de renouveller son mot de passe'));
        }
        return redirect()->route('archive.index')->withStatus(__('Problème non géré'));
    }


    public function import(Request $request)
    {

        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $validator = Validator::make($request->all(), [
            'userlist' => 'bail|required|file|mimes:xlsx'
        ]);

        if ($validator->fails()) {
            return redirect()->route("users.create")->withErrors($validator)->withInput();
        }

        try {
            $fichier = $request->userlist->move(public_path(), $request->userlist->hashName());
            $reader = SimpleExcelReader::create($fichier);
            $rows = $reader->getRows();
            $rows->each(function (array $rowProperties) {
                //  sleep(4);
                $user = new User();
                $user->statut = $rowProperties["Statut"];
                $gen_pwd = Str::random(8);
                $user->password = bcrypt($gen_pwd);
                //dd( $user->password );
                if ($rowProperties["Statut"] == "admin") {
                    $admin = new Admin();
                    $admin->nom = $rowProperties["Nom"];
                    $admin->prenom = $rowProperties["Prenom"];
                    $admin->save();
                    $user->administrateur_id = $admin->id;
                } else {
                    $eleve = new Eleve();
                    $eleve->nom = $rowProperties["Nom"];
                    $eleve->prenom = $rowProperties["Prenom"];
                    $eleve->save();
                    $user->eleve_id = $eleve->id;
                }


                $user->email = $rowProperties["Email"];
                $user->save();
                $data = ([
                    "nom" =>  $rowProperties["Nom"],
                    "prenom" => $rowProperties["Prenom"],
                    "email" => $rowProperties["Email"],
                    "password" => $gen_pwd,
                ]);
                \Mail::to($rowProperties["Email"])->send(new WelcomeMail($data));
            });
            $reader->close(); // On ferme le $reader
            unlink($fichier);
        } catch (\Exception $e) {
            return redirect()->route("users.create")->withErrors("Le Fichier ne respecte pas le format imposé ! ");
        }
        return redirect()->route("users.index")->withStatus(__("Importation réussie !"));
    }
}
