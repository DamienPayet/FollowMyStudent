<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/logger', 'LogController@access')->name('log');

//Route pour les admin :
Route::group(['middleware' => 'admin'], function () {
    //route affichage des logs :
    Route::get('/back/log', 'LogController@index')->name('log.view');
    Route::delete('/back/log/destroy/{id}', 'LogController@destroy')->name('log.destroy');
    Route::get('add-to-log', 'LogController@myTestAddToLog');

    Route::get('/download', 'LogController@export');

    //route admin gestion offre
    Route::resource('back/offre', 'OffreController');
    Route::post('/back/uoffre/{id}', 'OffreController@validation')->name('offre.validation');
    Route::delete('offres-deleteselection', 'offreController@deleteAll');
    //route admin gestion forum
    Route::resource('back/forum', 'ForumBackController'); //Voir pour modifier ça !!!
    Route::get('/back/esection/{id}', 'ForumBackController@edit')->name('section.edit');
    Route::post('/back/ssection', 'ForumBackController@store')->name('section.store');
    Route::post('/back/usection/{id}', 'ForumBackController@update')->name('section.update');
    Route::delete('/back/dsection/{id}', 'ForumBackController@destroy')->name('section.destroy');
    Route::get('/back/cforum/{id}', 'ForumBackController@create_categorie')->name('categorie.create');
    Route::post('/back/categorie', 'ForumBackController@store_categorie')->name('categorie.store');
    Route::get('/back/eforum/{id}', 'ForumBackController@edit_categorie')->name('categorie.edit');
    Route::post('/back/uforum/{id}', 'ForumBackController@update_categorie')->name('categorie.update');
    Route::delete('/back/dforum/{id}', 'ForumBackController@destroy_categorie')->name('categorie.destroy');
    Route::delete('/back/dsujet/{id}', 'ForumBackController@destroy_sujet')->name('sujet.destroy');

    //route admin gestion page accueil
    Route::resource('back/home', 'HomeBackController');

    //route admin gestion questionnaire
    Route::resource('back/questionnaire', 'QuestionnaireBackController');
    Route::get('/back/question/{id}', 'QuestionnaireBackController@create_question')->name('create.question');
    Route::post('/back/part', 'QuestionnaireBackController@store_part')->name('store.part');
    Route::get('/back/epart/{id}', 'QuestionnaireBackController@edit_part')->name('edit.part');
    Route::delete('/back/dpart/{id}', 'QuestionnaireBackController@destroy_part')->name('destroy.part');
    Route::post('/back/upart/{id}', 'QuestionnaireBackController@update_part')->name('update.part');
    Route::post('/back/uquest/{id}', 'QuestionnaireBackController@update_quest')->name('update.quest');

    //Route Gestion User
    Route::resource('back/users', UserController::class);
    Route::get('back/users/mdp/{users}', 'UserController@editMdp')->name('users.editMdp');
    Route::put('back/users/mdp/{users}', 'UserController@updateMdp')->name('users.updateMdp');
    Route::delete('users-deleteselection', 'UserController@deleteAll');

    Route::get('/back/avatar', 'UserController@avatar_index')->name('avatar.index');
    Route::get('/back/avatar/create', 'UserController@avatar_create')->name('avatar.create');
    Route::post('/back/avatar/store', 'UserController@avatar_store')->name('avatar.store');
    Route::delete('/back/avatar/delete/{id}', 'UserController@avatar_destroy')->name('avatar.destroy');
    Route::delete('avatars-deleteselection', 'UserController@avatar_deleteAll');


    //Route indexBack
    Route::get('/back/index', 'DashboardController@index')->name('indexback');

    //Route gestions demandes Contact
    Route::get('/back/contact', 'NousContacterController@index')->name('contact.index');
    Route::get('/back/contact/{id}', 'NousContacterController@show')->name('contact.show');
    Route::post('/back/ucontact/{id}', 'NousContacterController@update')->name('contact.update');
    Route::delete('/back/contact/{id}', 'NousContacterController@destroy')->name('contact.destroy');
    Route::delete('contact-deleteselection', 'NousContacterController@deleteAll');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'StudentFrontController@home')->name('index');
    Route::post('/back/order_up', 'QuestionnaireBackController@update_order')->name('updateorder');
    Route::post('/back/order_up/quest', 'QuestionnaireBackController@update_orderQuest')->name('updateorderquest');
    //Route redirection vers forum acceuil
    //Route::get('front/forum', 'StudentFrontController@forum')->name('forum');
    Route::resource('front/forum', 'ForumController');
    Route::get('front/forum', 'ForumController@index')->name('forum');
    Route::get('front/forum/categorie/{id}', 'ForumController@index_sujet')->name('sujet.index');
    Route::get('front/forum/create', 'ForumController@create')->name('sujet.create');
    Route::get('front/forum/sujet/{sujet}', 'ForumController@show_sujet')->name('sujet.show');
    Route::post('front/forum/sujet/like', 'ForumController@like')->name('reponses.like');
    Route::post('/sujet-resolution/{id}', 'ForumController@sujet_resolution')->name('sujet.resolution');
    Route::get('front/forum/sujet/{sujet}/reponse', 'ForumController@store_reponse')->name('sujet.reponse.store');
    Route::post('front/se/searcher', 'ForumController@searching')->name('sujet.searching');
    //Route redirection vers forum mes sujet
    Route::get('front/mes_sujets/user/{id}', 'ForumController@forum_messujets')->name('forum_mesSujets');
    Route::get('front/forum/sujet/{sujet}/edit', 'ForumController@edit_sujet')->name('sujet.edit');
    Route::post('front/forum/sujet/{sujet}/update', 'ForumController@update_sujet')->name('sujet.update');

    //Route  chat direct
    Route::get('my_chat', 'StudentFrontController@ajaxRequest1')->name('ajaxRequest.index');
    Route::post('ajaxRequest/conv', 'StudentFrontController@ajaxRequestSync')->name('ajaxRequest.sync');
    Route::post('ajaxRequest/testconv', 'StudentFrontController@ajaxRequestConvt')->name('ajaxRequest.testconv');
    Route::get('ajaxRequest/readed', 'StudentFrontController@ajaxRequestReaded')->name('ajaxRequest.readed');
    Route::post('ajaxRequest', 'StudentFrontController@ajaxRequestPost')->name('ajaxRequest.post');
    //Route redirection vers front offre
    Route::get('front/offres', 'OffreFrontController@index')->name('offre_front_index');
    Route::get('front/offres/create', 'OffreFrontController@create')->name('offre_front_create');
    Route::post('captcha-offre-validation', 'OffreFrontController@store')->name('offre_front_store');
    Route::get('front/offre/{offre}', 'OffreFrontController@show')->name('offre_front_show');
    //Route redirection vers questionnaire
    Route::get('front/questionnaire/index', 'StudentFrontController@indexQuestionnaire')->name("index_questionnaire");
    Route::get('front/questions', 'StudentFrontController@startQuestionnaire')->name('questions');
    Route::get('front/end_question', 'StudentFrontController@end_question')->name('end_question');
    Route::get('front/response_store', 'StudentFrontController@response_store')->name('response_store');
    //Route edition de profil utilisateur
    //Route::get('front/user/{user}', 'StudentFrontController@show')->name('profil_show');
    Route::get('front/user/{user}', ['as' => 'front.users.edit', 'uses' => 'StudentFrontController@edit']);
    Route::patch('front/user/{user}/update', ['as' => 'front.users.update', 'uses' => 'StudentFrontController@update']);
    Route::patch('/front/user/email-validation/{id}', 'StudentFrontController@email_update')->name('email.update');
    Route::patch('captcha-user-validation/{id}', 'StudentFrontController@update')->name('user_front_store');

    Route::post('captcha-contact-validation', 'NousContacterController@Contact');
    Route::get('/front/contact/reload-captcha', 'NousContacterController@reloadCaptcha');
});
// Route::get('/back1', function () {
//     return view('layouts.templateBack');
// })->name('back');


//Route Mentions légales
Route::get('front/mentions', 'MentionsLegController@index')->name('mentions.rgpd');
//Route pour recharger le captcha
Route::get('/reload-captcha', 'NousContacterController@reloadCaptcha');

// Render in view
Route::get('front/contact', [
    'uses' => 'NousContacterController@create'
])->name('contact.create');

// Post form data
Route::post('front/contact', [
    'uses' => 'NousContacterController@contact',
    'as' => 'contact.store'
]);
