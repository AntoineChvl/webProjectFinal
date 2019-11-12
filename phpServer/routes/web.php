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



Route::get('/events', 'EventsController@index')->name('events.index');
Route::post('/events', 'EventsController@store')->name('events.store')->middleware('authBDE');
Route::get('/events/create', 'EventsController@create')->name('events.create')->middleware('authBDE');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('events.edit')->middleware('authBDE');
Route::get('/events/{event}', 'EventsController@show')->name('events.show');
Route::put('/events/{event}', 'EventsController@update')->name('events.update')->middleware('authBDE');
Route::delete('/events/{event}', 'EventsController@destroy')->name('events.destroy')->middleware('authBDE');


//Page d'Accueil du magasin
Route::get('/shop', 'ShopController@index')->name('shop');
Route::resource('/product','ShopController');

Route::get('/accueilTest', function() {
    return view('home.home');
})->middleware('auth');


Route::get('/loginTest', function() {
    return view('registration-connection.register');
});

Route::post('/image', 'ImagesController@publishImage')->name('image');
Route::post('/imagePastEvent', 'ImagesController@uploadImagePastEvent')->name('imagePastEvent');

Route::post('/likeImage', 'LikesController@addLike');
Route::post('/unlikeImage', 'LikesController@removeLike');

Route::post('/addComment', 'CommentsController@add');
Route::post('/removeComment', 'CommentsController@remove');
Route::get('/getComments', 'CommentsController@index');

Route::resource('events.images', 'ImagesController')->except([
    'index', 'create', 'store', 'update', 'edit', 'destroy'
]);
