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
       
        return view('front/forum.index', compact('section'));

    }
    public function show(Sujet $sujet)
    {
        return view('front/forum.show', compact('sujet'));
    }}
