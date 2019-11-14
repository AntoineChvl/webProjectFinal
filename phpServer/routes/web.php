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

Route::get('/events/{event}/images/{image}', 'ImagesController@show')->name('events.images.show');

Route::get('/espace-admin', 'AdminController@index')->middleware('authBDE')->middleware('auth')->name('admin-panel');
Route::get('/espace-admin/images', 'AdminController@images')->middleware('authBDE')->middleware('auth')->name('admin-images');
Route::get('/espace-admin/events/users', 'AdminController@eventsUsers')->middleware('authBDE')->middleware('auth')->name('admin-event-users');


Route::get('/espace-admin/images/download', 'ImagesController@download')->name('images-download');

Route::post('/likeImage', 'LikesController@add');
Route::post('/unlikeImage', 'LikesController@remove');


Route::post('/addComment', 'CommentsController@add');

Route::post('/participateEvent', 'ParticipateController@participate');
Route::post('/unparticipateEvent', 'ParticipateController@noLongerParticipate');

Route::get('/contact','StaticPagesController@contact')->name('contact');
Route::get('/propos','StaticPagesController@propos')->name('propos');
Route::get('/legal_mention','StaticPagesController@legalMention')->name('legal_mention');
Route::get('/privacy_politicy','StaticPagesController@privacyPoliticy')->name('privacy_politicy');

Route::get('/member_space', function() {
    return view('registration-connection/member_space');
})->name('member_space');

Route::get('/member_space_modification', function() {
    return view('registration-connection/member_space_modification');
})->name('member_space_modification');

Route::get('/events/images/comments', 'CommentsController@allByEvent');


