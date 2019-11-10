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
Route::get('/', 'StaticPagesController@home');// -> redirection -> route('home')
Route::get('/home', 'StaticPagesController@home')->name('home');//page d'accueil
Route::get('/about', 'StaticPagesController@about')->name('about');//page d'accueil


// connection / inscription
Route::get('/login', 'LoginController@show')->name('login');//page de connection / inscription
Route::get('/logout', 'LoginController@logout')->name('logout');//page de deconnection
Route::post('/login', 'LoginController@login')->name('login');//reception du formulaire de connection -> redirection
Route::post('/register', 'LoginController@register')->name('register');//reception du formulaire d'inscription -> redirection

//activité
Route::resource('events','EventsController');
Route::resource('events.comments','Controller');
//Route::get('/events', 'Controller@exemple')->name('events');

//Page d'Accueil du magasin
Route::get('/shop', 'Controller@exemple')->name('shop');
Route::resource('shop/product','Controller');

Route::get('/accueilTest', function() {
    return view('home.home');
})->middleware('auth');


Route::get('/loginTest', function() {
    return view('registration-connection.register');
});

Route::post('/image', 'ImagesController@store')->name('image');



