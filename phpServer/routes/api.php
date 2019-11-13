<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events/images/all', 'ImagesController@imagesByEvent');

Route::get('/events/images/comments', 'CommentsController@allByEvent');

Route::post('/espace-admin/images/validate/', 'ImagesController@updateImage');

Route::post('/espace-admin/comments/validate/', 'CommentsController@updateCommentStatus');

Route::get('/espace-admin/comments/validate/{uploadImageId}', 'CommentsController@commentsEvent');

Route::get('/espace-admin/events/users/all', 'EventsController@users');
