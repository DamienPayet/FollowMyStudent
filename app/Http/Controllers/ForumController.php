<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sujet;
use App\Section;

class ForumController extends Controller
{
    public function index()
    {
        $section = Section::all();
        $sujet = Sujet::all();
        return view('front/forum.index', compact('section', 'sujet'));
    }
    public function show(Sujet $sujet)
    {
        return view('front/forum.show', compact('sujet'));
    }
    public function create()
    {
        return view('front.forum.create_sujet');
    }

}
