<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
          'email' => 'required|email',
          'mdp' => 'required',
          'statut' => 'required',
          'image_profil' => 'required',

        ]);
        if ($validator->fails()){
          return redirect()->route("users.create")->withErrors($validator)->withInput();
        }
        $user = new User;
        $user->name="carca";
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('mdp'));
        $user->statut = $request->input('statut');


        $avatar = $request->file('image_profil');
    		$filename = time(). 'testTROTTRO '. '.' .$avatar->getClientOriginalName(). $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('back/uploads/avatars/' . $filename ) );

    		$user->image_profil = $filename;
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
    }
}
