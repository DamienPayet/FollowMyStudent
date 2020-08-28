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

Route::get('/', function () {
    return view('front.index');
})->name('index');
Route::get('/login', function () {
    return view('auth/login')->middleware('auth');
});
//Route redirection vers questionnaire
Route::get('front/questionnaire', 'StudentFrontController@questionnaire')->name('questionnaire');
//Route redirection vers forum acceuil
Route::get('front/forum', 'StudentFrontController@forum')->name('forum');
//Route redirection vers forum mes sujet
Route::get('front/mes_sujets', 'StudentFrontController@forum_mes_sujets')->name('forum_mesSujets');
//Route redirection vers les offres
Route::get('front/offres', 'StudentFrontController@offre')->name('offre');


Route::get('/testBack', function () {
    return view('templateBack');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
