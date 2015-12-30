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
    return view('welcome', ['cristal' => true]);
}]);

Route::get('/forum', ['as' => 'forum', function () {
    return view('forum.index', ['cristal' => false]);
}]);

Route::get('/forum/tag', ['as' => 'forum.tag', function () {
    \Illuminate\Support\Facades\Session::flash('message', 'Bienvenue sur notre site, nous vous souhaitons une agréable visite');
    return view('forum.tag', ['cristal' => false]);
}]);

Route::get('/forum/topic', ['as' => 'forum.topic', function () {
    return view('forum.topic', ['cristal' => false]);
}]);

Route::get('/register', ['as' => 'user.register', function () {
    return view('user.register', ['cristal' => true]);
}]);

Route::get('/profile', ['as' => 'user.profile', function () {
    return view('user.view', ['cristal' => false]);
}]);

Route::get('/redactor', ['as' => 'redactor', function () {
    return view('redactor', ['cristal' => true]);
}]);

Route::get('/debug', 'DebugController@debug');
