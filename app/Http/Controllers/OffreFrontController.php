<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

class OffreFrontController extends Controller
{
    public function index()
    {
        $offres = Offre::paginate(6);
        $pop_offres = Offre::orderBy('nb_vue', 'desc')->take(3)->get();
        return view('front/offre.index', compact('offres','pop_offres'));
    }
    public function show(Request $request,Offre $offre)
    {
        $offre->nb_vue += 1;
        $offre->update();
        return view('front/offre.show', compact('offre'));
    }
}
