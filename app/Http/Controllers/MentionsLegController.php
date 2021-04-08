<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentionsLegController extends Controller
{
    public function index()
    {
        \LogActivity::addToLog('RGPD - Affichage mentions');
        return view('front/mentions.rgpd');
    }
    public function nous()
    {
        \LogActivity::addToLog('Mentions - Affichage crédits');
        return view('front/mentions.nous');
    }
}
