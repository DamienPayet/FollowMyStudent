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
        \LogActivity::addToLog('Admin - Affichage demandes contacts');
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
        \LogActivity::addToLog('Admin - Détails demande contact');
        return view('back.contact.show', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->traite = !$contact->traite;
        $contact->update();
        //dd($contact);
        \LogActivity::addToLog('Admin - Modification demande contact');
        return redirect()->route('contact.index')->withStatus(__('Demande traitée !'));
    }
    // Store Contact Form data
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sujet' => 'required|min:8',
            'message' => 'required|min:15',
            'captcha' => 'required|captcha',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $contact = new Contact();

        //  Store data in database
        $contact->nom = $request->get('nom');
        $contact->prenom = $request->get('prenom');
        $contact->email = $request->get('email');
        $contact->telephone = $request->get('telephone');

        $bad_words_sujet = $request->get('sujet');
        $bad_words_message = $request->get('message');
        $clean_words_sujet = Profanity::blocker($bad_words_sujet)->filter();
        $clean_words_message = Profanity::blocker($bad_words_message)->filter();

        $contact->sujet = Profanity::blocker($bad_words_sujet)->filter();
        $contact->message = Profanity::blocker($bad_words_message)->filter();

        $contact->save();

        //  Send mail to admin
        \Mail::send('vendor.notifications.contact', array(
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'sujet' => $clean_words_sujet,
            'user_query' => $clean_words_message,
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to('admin@gmail.com', 'Admintrateur FMS')->subject('[FMS] - Nouvelle demande de contact');
        });
        // 
        \LogActivity::addToLog('User - Création demande contact');
        return redirect()->route('contact.create')->with('success', 'Nous avons bien reçu votre message ! Merci de nous écrire, nous reviendrons prochainement vers vous.');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();
        \LogActivity::addToLog('Admin - Suppression demande contact');

        return redirect()->route('contact.index')->withStatus(__('Demande supprimée avec succès'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("contacts")->whereIn('id', explode(",", $ids))->delete();
        \LogActivity::addToLog('Admin - Suppressions multiples demande contact');

        return response()->json(['success' => "Les demandes ont été supprimées avec succès."]);

        //return redirect()->route('contact.index')->withStatus(__('Offres supprimées avec succès'));
    }
    public function reloadCaptcha()
    {
        \LogActivity::addToLog('Rechargement captcha');
        return response()->json(['captcha' => captcha_img()]);
    }
}
