<?php

namespace App\Http\Controllers;

use App\HomePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class HomeBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = HomePost::all();

        return view('back.home.index' , compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('back.home.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new HomePost();
        $post->titre = $request->titre;
        if(isset($request->txtbo)){
            $post->description = $request->txtbo;
        }
        if(isset($request->link)){
            $post->lien = $request->link;
        }
        if($request->file('pic') != null){
            $picture = $request->file('pic');
            $filename = 'back/uploads/article/' . date('Y-m-d') . '_' . $picture->getClientOriginalName();
            Image::make($picture)->save(public_path($filename));
            $post->image = $filename;
        }
        $id = HomePost::orderBy('position', 'DESC')->get();
        if($id->count()  > 0){
            $post->position = $id[0]->position + 1 ;
        }else
            $post->position = 1;

        $post->save();
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
        $post = HomePost::find($id);
        $user =  Auth::user();
        return view('back.home.create' , compact('user','post'));
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
