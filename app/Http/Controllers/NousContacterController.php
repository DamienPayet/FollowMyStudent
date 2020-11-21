<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    public function show(Request $request)
    {
        return view('back.contact.show');
    }
    // Store Contact Form data
    public function contact(Request $request)
    {
        //dd($request);
        // Form validation
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sujet' => 'required|min:8',
            'message' => 'required|min:15'
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
    public function destroy(Contact $contact)
    {
     
      $contact->delete();
      return redirect()->route('contact.index')->withStatus(__('Demande supprimée avec succès'));
    }
}
