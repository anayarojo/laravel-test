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

Route::get('/', "PagesController@home");
Route::get('/messages/{message}', "MessagesController@show");
Route::get('/messages', "MessagesController@search");

Auth::routes();
Route::get('/auth/facebook', "SocialAuthController@facebook");
Route::get('/auth/facebook/callback', "SocialAuthController@callback");
Route::post('/auth/facebook/register', "SocialAuthController@register");

Route::group(["middleware" => "auth"], function () {
    Route::post("/messages/create", "MessagesController@create");
    Route::post('/users/{username}/dms', "UsersController@sendPrivateMessage");
    Route::post('/users/{username}/follow', "UsersController@follow");
    Route::post('/users/{username}/unfollow', "UsersController@unfollow");
    Route::get('/conversations/{conversation}', "UsersController@showConversation");
    Route::get("/api/notifications", "UsersController@notifications");
});

Route::get("/api/messages/{message}/responses", "MessagesController@responses");

Route::get('/users/{username}/follows', "UsersController@follows");
Route::get('/users/{username}/followers', "UsersController@followers");
Route::get('/users/{username}', "UsersController@show");
