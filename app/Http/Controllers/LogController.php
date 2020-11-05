<?php

namespace App\Http\Controllers;
use App\AuditAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

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
    public function index(){
        $logs = AuditAction::all();
        return view('back/log.index' ,compact('logs'));
    }
    public function export(){
        $fp = fopen('log.csv', 'w');
        $log = AuditAction::all();

        foreach ($log as $fields) {
            fputcsv($fp, $fields->attributesToArray());
        }
        fclose($fp);
        $file="log.csv";
        return Response::download($file);
    }
}
