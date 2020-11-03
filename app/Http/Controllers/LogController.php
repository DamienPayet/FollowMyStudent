<?php

namespace App\Http\Controllers;
use App\AuditAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function access(Request $request)
    {
       $logdb = new AuditAction;
         if(auth()->check()){
             $user = auth::user();
             $logdb->user_id = $user->id;
         }

         $logdb->action = "accès_page : ". $request->page;
         $logdb->ip = $request->ip;
         $logdb->navigateur = $request->navigateur;
         $logdb->city = $request->city;
         $logdb->country = $request->country;

            $logdb->save();
        return response()->json(['user' =>$logdb]);
    }
}
