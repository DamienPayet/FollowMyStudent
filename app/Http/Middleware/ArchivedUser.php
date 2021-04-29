<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class ArchivedUser
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
        if (auth()->user()->archived != 1) {
            return $next($request);
        }
    
       // Auth::logout($request);
       
       \Auth::logout();
      // flash('Logout')->success();
      return redirect()->route('login')->with('status','Votre compte est désactivé ! Veuillez contacter l\'administrateur du site si vous pensez qu\'il s\'agit d\'une erreur.');

        // return redirect('/logout-archived')->with('info', 'Votre compte est désactivé.');
    }
}
