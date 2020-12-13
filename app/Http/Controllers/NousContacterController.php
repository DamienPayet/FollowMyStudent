<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use \Validator;
use ConsoleTVs\Profanity\Facades\Profanity;

class NousContacterController extends Controller
{
    public function index()
    {
        //
        $contact = Contact::all();
        return view('back.contact.index')->with('contact', $contact);
    }
    public function create(User $user, Request $request)
    {
        $user = Auth::user();

        return view('front.mentions.contact', compact('user'));
    }
    public function show(Request $request, $id)
    {
        $contact = Contact::find($id);
        return view('back.contact.show', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->traite = !$contact->traite;
        $contact->update();
        //dd($contact);
        return redirect()->route('contact.index')->withStatus(__('Demande traitée !'));
    }
    // Store Contact Form data
    public function contact(Request $request)
    {
        //dd($request);
        // Form validation
        Validator::extend('not_contains', function ($attribute, $value, $parameters) {
            // Banned words
            $words = array('coucou', 'test', 'suce');
            foreach ($words as $word) {
                if (stripos($value, $word) !== false) return false;
            }
            return true;
        });
        $rules = array(
            'message' => 'not_contains',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sujet' => 'required|min:8',
            'message' => 'required|min:15',
            'captcha' => 'required|captcha',
        );

        $messages = array(
            'not_contains' => 'The :attribute must not contain banned words',
        );

        $validator = Validator::make(\Request::all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);;
        }
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sujet' => 'required|min:8',
            'message' => 'required|min:15',
            'captcha' => 'required|captcha',
        ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('vendor.notifications.contact', array(
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'sujet' => $request->get('sujet'),
            'user_query' => $request->get('message'),
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to('pelletier.ft1@gmail.com', 'Admintrateur FMS')->subject('[FMS] - Nouvelle demande de contact');
        });
        // 
        return back()->with('success', 'Nous avons bien reçu votre message ! Merci de nous écrire, nous reviendrons prochainement vers vous.');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();
        return redirect()->route('contact.index')->withStatus(__('Demande supprimée avec succès'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("contacts")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Les demandes ont été supprimées avec succès."]);

        //return redirect()->route('contact.index')->withStatus(__('Offres supprimées avec succès'));
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
