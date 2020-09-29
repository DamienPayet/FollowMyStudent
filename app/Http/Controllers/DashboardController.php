<?php

namespace App\Http\Controllers;

use App\Offre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $offres = Offre::all();

        return view('back.dashboard.index', compact('offres'));

    }
}
