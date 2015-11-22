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
    return view('forum.tag', ['cristal' => false]);
}]);

Route::get('/forum/topic', ['as' => 'forum.topic', function () {
    return view('forum.topic', ['cristal' => false]);
}]);


