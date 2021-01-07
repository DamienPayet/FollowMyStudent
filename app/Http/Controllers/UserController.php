<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Eleve;
use App\Admin;
use App\Traits\UploadTrait;
use Validator;
use Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  use UploadTrait;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $user = User::all();
    return view('back.user.index')->with('user', $user);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $images = \File::allFiles(public_path('front/images/avatars'));
    return view('back.user.create', compact('images'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
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

    return redirect()->route("users.index")->with('success', 'Création réussie !');
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
    return view('back.user.show')->with('user', $user);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
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
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
    $validator = Validator::make($request->all(), [
      'nom' => 'required',
      'prenom' => 'required',
      'email' => 'required|email',
      'password' => 'same:password_confirmation',
      'statut' => 'required',
    ]);
    if ($validator->fails()) {
      return redirect()->route("users.edit", $id)->withErrors($validator)->withInput();
    }

    $user = User::find($id);

    if ($user->statut == "eleve") {
      $user->eleve->nom = $request->input('nom');
      $user->eleve->prenom = $request->input('prenom');
      $user->eleve->save();
    } elseif ($user->statut == "admin") {
      $user->admin->nom = $request->input('nom');
      $user->admin->prenom = $request->input('prenom');
      $user->admin->save();
    }
    $getmail = $request->input('email');
    $user->email = $request->input('email');
    if ($user->email != $getmail) {
      $user->email = $request->input('email');
      $user->email_verified_at = null;
    }
    $user->statut = $request->input('statut');
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

    return redirect()->route("users.index")->with('success', 'Modification réussie !');
  }

  public function editMdp($id)
  {
    //
    $user = User::find($id);
    return view('back.user.editMdp')->with('user', $user);
  }

  public function updateMdp(Request $request, $id)
  {
    //
    $validator = Validator::make($request->all(), [
      'mdp' => 'required',
    ]);
    if ($validator->fails()) {
      return redirect()->route("users.editMdp", $id)->withErrors($validator)->withInput();
    }
    $user = User::find($id);
    $user->password = bcrypt($request->input('mdp'));
    $user->save();

    return redirect()->route("users.index")->with('success', 'Modification réussie !');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
    $user = User::find($id);

    if ($user->statut == "eleve") {
      $user->eleve->delete();
    } elseif ($user->statut == "admin") {
      $user->admin->delete();
    }

    $user->delete();

    return redirect()->route("users.index")->with('error', 'Suppression réussie !');
  }
  public function deleteAll(Request $request)
  {
    $ids = $request->ids;
    DB::table("users")->whereIn('id', explode(",", $ids))->delete();
    return response()->json(['success' => "Utilisateur(s) supprimé(s) avec succès."]);

    //return redirect()->route('offres.index')->withStatus(__('Offres supprimées avec succès'));
  }
  public function avatar_index()
  {
    //
    $images = \File::allFiles(public_path('front/images/avatars'));
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
    return view('back.avatar.index', compact('images'));
  }
  public function avatar_store(Request $request)
  {
    $avatar = $request->file('fileUpload');
    $filename = 'front/images/avatars/' . $avatar->getClientOriginalName();
    Image::make($avatar)->resize(300, 300)->save(public_path($filename));

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
    return redirect()->route("avatar.index")->with('success', 'Avatar supprimé !');
  }
  public function avatar_deleteAll(Request $request)
  {
    $ids = $request->ids;

    $ids = explode(",", $ids);

    foreach ($ids as $id) {
      \File::delete(public_path() . '/front/images/avatars/' .$id);
    }
    return response()->json(['success' => "Avatars supprimés avec succès."]);
  }
}
