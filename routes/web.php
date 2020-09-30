<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('front.index');
})->name('index')->middleware('auth');


//Route pour les admin :
Route::group(['middleware' => 'admin'], function () {
    //route admin gestion user
    Route::resource('back/users', UserController::class);
    //route admin gestion offre
    Route::resource('back/offre', 'OffreController');
    //route admin gestion questionnaire
    Route::resource('back/questionnaire', 'QuestionnaireBackController');
    Route::get('/back/question/{id}', 'QuestionnaireBackController@create_question')->name('create.question');
    Route::post('/back/part', 'QuestionnaireBackController@store_part')->name('store.part');
    Route::get('/back/epart/{id}', 'QuestionnaireBackController@edit_part')->name('edit.part');
    Route::delete('/back/dpart/{id}', 'QuestionnaireBackController@destroy_part')->name('destroy.part');
    Route::post('/back/upart/{id}', 'QuestionnaireBackController@update_part')->name('update.part');
    Route::post('/back/uquest/{id}', 'QuestionnaireBackController@update_quest')->name('update.quest');

    //Route indexBack
    Route::get('/back/index', 'DashboardController@index')->name('indexback');
});

Route::group(['middleware' => 'auth'], function () {
    //Route redirection vers forum acceuil
    Route::get('front/forum', 'StudentFrontController@forum')->name('forum');
    //Route redirection vers forum mes sujet
    Route::get('front/mes_sujets', 'StudentFrontController@forum_mes_sujets')->name('forum_mesSujets');
    //Route  chat direct
    Route::get('ajaxRequest', 'StudentFrontController@ajaxRequest')->name('ajaxRequest.index');
    Route::get('tata', 'StudentFrontController@ajaxRequest1')->name('ajaxRequest.index');
    Route::post('ajaxRequest/conv', 'StudentFrontController@ajaxRequestSync')->name('ajaxRequest.sync');
    Route::post('ajaxRequest', 'StudentFrontController@ajaxRequestPost')->name('ajaxRequest.post');
    //Route redirection vers front offre
    Route::get('front/offres', 'OffreFrontController@index')->name('offre_front_index');
    Route::get('front/offre/{offre}', 'OffreFrontController@show')->name('offre_front_show');
    //Route redirection vers questionnaire
    Route::get('front/questionnaire', 'StudentFrontController@questionnaire')->name('questionnaire');
    Route::get('front/questions', 'StudentFrontController@questions')->name('questions');
    Route::get('front/end_question', 'StudentFrontController@end_question')->name('end_question');
    Route::get('front/response_store', 'StudentFrontController@response_store')->name('response_store');
    //Route edition de profil utilisateur
    //Route::get('front/user/{user}', 'StudentFrontController@show')->name('profil_show');
    Route::get('front/user/{user}',  ['as' => 'users.edit', 'uses' => 'StudentFrontController@edit']);
    Route::patch('front/user/{user}/update',  ['as' => 'users.update', 'uses' => 'StudentFrontController@update']);

});
