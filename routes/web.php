<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('front.index');
})->name('index');
//Route::get('front/index', 'OffreController@in')->name('front.offre');

//Route redirection vers questionnaire
Route::get('front/questionnaire', 'StudentFrontController@questionnaire')->name('questionnaire');
Route::get('front/questions', 'StudentFrontController@questions')->name('questions');
Route::get('front/end_question', 'StudentFrontController@end_question')->name('end_question');
Route::get('front/response_store', 'StudentFrontController@response_store')->name('response_store');
//Route redirection vers forum acceuil
Route::get('front/forum', 'StudentFrontController@forum')->name('forum');
//Route redirection vers forum mes sujet
Route::get('front/mes_sujets', 'StudentFrontController@forum_mes_sujets')->name('forum_mesSujets');
//Route redirection vers les offres
Route::get('front/offre', 'OffreFrontController@index')->name('offre_front_index');
Route::get('front/offre/{offre}', 'OffreFrontController@show')->name('offre_front_show');

Route::group(['middleware' => 'auth'], function () {
    //Route::resource('front/offre','OffreFrontController');
    Route::resource('back/offre','OffreController');

});

Route::get('/testBack', function () {
    return view('templateBack');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route BACK
Route::get('/testBack', function () {
    return view('layouts.templateBack');
});
//Route Gestion User
Route::resource('back/users', UserController::class);
