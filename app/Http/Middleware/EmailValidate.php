<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Redirect;

class EmailValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->email_verified_at != null && Auth::user()->password_change_at != null) {
            return $next($request);
           
        }
        return redirect('/')->withStatus(__('Vous n\'êtes pas autorisés à accéder à cette page.'));

//        return redirect()->route('index')->with('error', 'Accès refusé ! Veuillez valider votre email');
    }
}
