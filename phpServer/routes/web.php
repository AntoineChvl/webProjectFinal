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

// accueil
Route::get('/', 'Controller@exemple');// -> redirection -> route('home')
Route::get('/home', 'Controller@exemple')->name('home');//page d'accueil
Route::get('/about', 'Controller@exemple')->name('about');//page d'accueil


// connection / inscription
Route::get('/login', 'LoginController@show')->name('login');//page de connection / inscription
Route::get('/logout', 'Controller@exemple')->name('logout');//page de deconnection
Route::post('/login', 'Controller@exemple')->name('login');//reception du formulaire de connection -> redirection
Route::post('/register', 'Controller@exemple')->name('register');//reception du formulaire d'inscription -> redirection

//activité
Route::resource('events','Controller');
Route::resource('events.comments','Controller');
//Route::get('/events', 'Controller@exemple')->name('events');

//Page d'Accueil du magasin
Route::get('/shop', 'Controller@exemple')->name('shop');
Route::resource('shop/product','Controller');

Route::get('/accueilTest', function() {
    return view('home.home');
});


Route::get('/loginTest', function() {
    return view('registration-connection.register');
});




