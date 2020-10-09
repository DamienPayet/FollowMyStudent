<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sujet;
class ForumController extends Controller
{
    public function index()
    {
        $offres = Sujet::all();
       
        return view('front/forum.index', compact('sujets'));

    }
    public function show(Sujet $sujet)
    {
        return view('front/forum.show', compact('sujet'));
    }}
