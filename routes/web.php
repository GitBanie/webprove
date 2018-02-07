<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route pour la page d'auth
Route::get('/home', 'HomeController@index')->name('home');

# Création des routes du front

Route::get('/', "FrontController@index")->name('index');

Route::get('post/{id}', "FrontController@show")->name('show');

Route::get('/stage', "FrontController@stage")->name('stage');

Route::get('/formation', "FrontController@formation")->name('formation');

Route::get('/contact', "ContactController@contact")->name('contact');

Route::post('/contact',  'ContactController@mailToAdmin')->name('contactAdmin');

Route::any('/search', "FrontController@search")->name('search');
