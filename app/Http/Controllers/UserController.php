<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Eleve;
use App\Admin;
use App\Traits\UploadTrait;
use Validator;
use Image;

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
        return view('back.user.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.user.create');
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
        if ($validator->fails()){
          return redirect()->route("users.create")->withErrors($validator)->withInput();
        }

        $user = new User;

        if ($request->input('statut') == "eleve") {
          $eleve = new Eleve;
          $eleve->nom = $request->input('nom');
          $eleve->prenom = $request->input('prenom');
          $eleve->save();
          $user->eleve_id = $eleve->id;
        }elseif ($request->input('statut') == "admin") {
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
        if ($request->file('image_profil') == null) {
          $user->image_profil = "default.png";
        }else {
          $avatar = $request->file('image_profil');
          $filename = 'back/uploads/avatars/' . date('Y-m-d') . '_' . $avatar->getClientOriginalName();
          Image::make($avatar)->resize(300,300)->save( public_path( $filename ) );
          $user->image_profil = $filename;
        }
        //
        $user->save();

        return redirect()->route("users.index")->with('success','Création réussite !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('back.user.edit')->with('user',$user);
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
          'statut' => 'required',
        ]);
        if ($validator->fails()){
          return redirect()->route("users.edit", $id)->withErrors($validator)->withInput();
        }

        $user = User::find($id);

        if ($user->statut == "eleve") {
          $user->eleve->nom = $request->input('nom');
          $user->eleve->prenom = $request->input('prenom');
          $user->eleve->save();
        }elseif ($user->statut == "admin") {
          $user->admin->nom = $request->input('nom');
          $user->admin->prenom = $request->input('prenom');
          $user->admin->save();
        }

        $user->email = $request->input('email');
        $user->statut = $request->input('statut');

        //Insertion IMAGE
        if ($request->file('image_profil') == null) {
        }else {
          $avatar = $request->file('image_profil');
          $filename = 'back/uploads/avatars/' . date('Y-m-d') . '_' . $avatar->getClientOriginalName();
          Image::make($avatar)->resize(300,300)->save( public_path($filename ) );
          $user->image_profil = $filename;
        }
        $user->save();

        return redirect()->route("users.index")->with('success','Modification réussite !');
    }

    public function editMdp($id)
    {
        //
        $user = User::find($id);
        return view('back.user.editMdp')->with('user',$user);
    }

    public function updateMdp(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
          'mdp' => 'required',
        ]);
        if ($validator->fails()){
          return redirect()->route("users.editMdp", $id)->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->password = bcrypt($request->input('mdp'));
        $user->save();

        return redirect()->route("users.index")->with('success','Modification réussite !');

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
        }elseif ($user->statut == "admin") {
          $user->admin->delete();
        }

        $user->delete();

        return redirect()->route("users.index")->with('error','Suppression réussite !');
    }
}
