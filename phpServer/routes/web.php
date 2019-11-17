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


Route::get('/', 'StaticPagesController@home');
Route::get('/home', 'StaticPagesController@home')->name('home');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/contact','StaticPagesController@contact')->name('contact');
Route::get('/propos','StaticPagesController@propos')->name('propos');
Route::get('/legal_mention','StaticPagesController@legalMention')->name('legal_mention');
Route::get('/privacy_politicy','StaticPagesController@privacyPoliticy')->name('privacy_politicy');
Route::get('/cgv','StaticPagesController@cgv')->name('cgv');

Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login')->name('login')->middleware('guest');
Route::post('/register', 'LoginController@register')->name('register')->middleware('guest');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::get('/events/all', 'EventsController@allFormatted');
Route::get('/events/more-data', 'EventsController@moreEvents');
Route::get('/events', 'EventsController@index')->name('events.index');
Route::post('/events', 'EventsController@store')->name('events.store')->middleware('authBDE');
Route::get('/events/create', 'EventsController@create')->name('events.create')->middleware('authBDE')->middleware('auth');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('events.edit')->middleware('authBDE');
Route::get('/events/{event}', 'EventsController@show')->name('events.show');
Route::put('/events/{event}', 'EventsController@update')->name('events.update')->middleware('authBDE');
Route::delete('/events/{event}', 'EventsController@destroy')->name('events.destroy')->middleware('authBDECESI');


Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/cart', 'ShopController@indexCart')->name('shop.cart');
Route::get('/shop/order', 'ShopController@order')->name('shop.order')->middleware('auth');
Route::get('/shop/buy', 'ShopController@buy')->name('shop.buy')->middleware('auth');
Route::post('/shop/product/{id}/addToCart', 'ShopController@addToCart')->name('shop.addToCart');
Route::post('/shop/product/{id}/delToCart', 'ShopController@delToCart')->name('shop.delToCart');
Route::get('/shop/product','ShopController@index')->name('shop.product.index');
Route::get('/shop/product/create','ShopController@create')->name('shop.product.create')->middleware('authBDE');
Route::post('/shop/product','ShopController@store')->name('shop.product.store')->middleware('authBDE');
Route::get('/shop/product/{id}','ShopController@show')->name('shop.product.show');
Route::get('/shop/product/{id}/edit','ShopController@edit')->name('shop.product.edit')->middleware('authBDE');
Route::patch('/shop/product/{id}','ShopController@update')->name('shop.product.update')->middleware('authBDE');
Route::delete('/shop/product/{id}','ShopController@destroy')->name('shop.product.destroy')->middleware('authBDE');

Route::get('/shop/category/create','CategoryController@create')->name('shop.category.create')->middleware('authBDE');
Route::get('/shop/category/{id}','CategoryController@show')->name('shop.category.show');
Route::post('/shop/category','CategoryController@store')->name('shop.category.store')->middleware('authBDE');
Route::delete('/shop/category/{id}','CategoryController@destroy')->name('shop.category.destroy')->middleware('authBDE');

Route::post('/image', 'ImagesController@publishImage')->name('image')->middleware('authBDE');
Route::post('/imagePastEvent', 'ImagesController@uploadImagePastEvent')->name('imagePastEvent');

Route::get('/events/{event}/images/{image}', 'ImagesController@show')->name('events.images.show');

Route::get('/espace-admin', 'AdminController@index')->middleware('authBDECESI')->middleware('auth')->name('admin-panel');
Route::get('/espace-admin/images', 'AdminController@images')->middleware('authBDECESI')->middleware('auth')->name('admin-images');
Route::get('/espace-admin/events/users', 'AdminController@eventsUsers')->middleware('authBDE')->middleware('auth')->name('admin-event-users');
Route::get('/events/images/comments', 'CommentsController@allByEvent')->middleware('authBDECESI');
Route::post('/espace-admin/comments/validate', 'CommentsController@updateCommentStatus')->middleware('authBDECESI');
Route::get('/espace-admin/comments/validate/{uploadImageId}', 'CommentsController@commentsEvent')->middleware('authBDECESI');
Route::post('/espace-admin/images/validate', 'ImagesController@updateImage')->middleware('authBDECESI');
Route::get('/espace-admin/images/download', 'ImagesController@download')->name('images-download')->middleware('authCESI');
Route::get('/espace-admin/products/all', 'AdminController@products')->name('admin-products')->middleware('authBDECESI');
Route::get('/espace-admin/categories/all','AdminController@categories')->name('admin-categories')->middleware('authBDE');
Route::get('/espace-admin/events/all', 'AdminController@events')->name('admin-events')->middleware('authBDECESI');

Route::post('/likeImage', 'LikesController@add')->middleware('auth');
Route::post('/unlikeImage', 'LikesController@remove')->middleware('auth');


Route::post('/addComment', 'CommentsController@add')->middleware('auth');

Route::post('/participateEvent', 'ParticipateController@participate')->middleware('auth');
Route::post('/unparticipateEvent', 'ParticipateController@noLongerParticipate')->middleware('auth');

Route::get('/myProfile', 'StaticPagesController@showUser')->name('member_space')->middleware('auth');

Route::get('/shop/products/all', 'ShopController@allFormatted')->middleware('authBDE');
Route::get('/shop/categories/all', 'CategoryController@allFormatted')->middleware('authBDE');
