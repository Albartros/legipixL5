<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', function () {
    return view('welcome', ['cristalPage' => true]);
}]);

Route::get('/forum', ['as' => 'forum', function () {
    return view('forum.index');
}]);

Route::get('/forum/tag', ['as' => 'forum.tag', function () {
    \Illuminate\Support\Facades\Session::flash('message', 'Bienvenue sur notre site, nous vous souhaitons une agréable visite');
    return view('forum.tag');
}]);

Route::get('/forum/topic', ['as' => 'forum.topic', function () {
    return view('forum.topic');
}]);

Route::get('/register', ['as' => 'user.register', function () {
    return view('user.register', ['cristalPage' => true]);
}]);

Route::get('/profile', ['as' => 'user.profile', function () {
    return view('user.view');
}]);

Route::get('/redactor', ['as' => 'redactor', function () {
    return view('redactor', ['cristalPage' => true]);
}]);

Route::get('/debug', 'DebugController@debug');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
