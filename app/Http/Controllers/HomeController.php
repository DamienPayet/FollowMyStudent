<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $cookieConsentConfig = config('cookie-consent');
        $alreadyConsentedWithCookies = Cookie::has($cookieConsentConfig['cookie_name']);

        $offres = Offre::all();
        return view('home', compact('offres','alreadyConsentedWithCookies'));
    }

}
