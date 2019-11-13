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
Route::get('/events/create', 'EventsController@create')->name('events.create')->middleware('authBDE')->middleware('auth');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('events.edit')->middleware('authBDE');
Route::get('/events/{event}', 'EventsController@show')->name('events.show');
Route::put('/events/{event}', 'EventsController@update')->name('events.update')->middleware('authBDE');
Route::delete('/events/{event}', 'EventsController@destroy')->name('events.destroy')->middleware('authBDE');


//Page d'Accueil du magasin
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/cart', 'ShopController@indexCart')->name('cart');
Route::get('/shop/order', 'ShopController@order')->name('shop.order');
Route::get('/shop/buy', 'ShopController@buy')->name('shop.buy');
Route::post('/shop/product/{id}/addToCart', 'ShopController@addToCart')->name('shop.addToCart');
Route::get('/shop/product','ShopController@index')->name('shop.product.index');
Route::get('/shop/product/create','ShopController@create')->name('shop.product.create');
Route::post('/shop/product','ShopController@store')->name('shop.product.store');
Route::get('/shop/product/{id}','ShopController@show')->name('shop.product.show');
Route::get('/shop/product/{id}/edit','ShopController@edit')->name('shop.product.edit');
Route::patch('/shop/product/{id}','ShopController@update')->name('shop.product.update');
Route::delete('/shop/product/{id}','ShopController@destroy')->name('shop.product.destroy');

Route::get('/shop/category','CategoryController@index')->name('shop.category.index');
Route::get('/shop/category/create','CategoryController@create')->name('shop.category.create');
Route::post('/shop/category','CategoryController@store')->name('shop.category.store');
Route::delete('/shop/category/{id}','CategoryController@destroy')->name('shop.category.destroy');

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

Route::post('/participateEvent', 'ParticipateController@participate');
Route::post('/unparticipateEvent', 'ParticipateController@noLongerParticipate');

Route::get('/espace-admin', 'AdminController@index')->name('admin-images')->middleware('authBDE')->middleware('auth');
Route::get('/espace-admin/images', 'AdminController@images')->middleware('authBDE')->middleware('auth');
Route::post('/espace-admin/images/validate/', 'ImagesController@updateImage')->middleware('authBDE')->middleware('auth');

Route::get('/contact', function() {
    return view('infos/contact');
})->name('contact');

Route::get('/propos', function() {
    return view('infos/propos');
})->name('propos');

Route::get('/privacy_politicy', function() {
    return view('infos/privacy_politicy');
})->name('privacy_politicy');

Route::get('/legal_mention', function() {
    return view('infos/legal_mention');
})->name('legal_mention');
