<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('share/{short}', 'RedirectController@short')->name('share');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index')->name('getHome');
    Route::get('/page/{slug}', 'PageController@page')->name('getPage');

    // Membres
    Route::group(['prefix' => 'profil'], function () {
        // Authentification
        Route::group(['namespace' => 'Auth'], function() {
            Route::get('connexion', 'AuthController@getLogin')->name('user.getLogin');
            Route::get('inscription', 'AuthController@getRegister')->name('user.getRegister');
            Route::get('logout', 'AuthController@getLogout')->name('user.getLogout');
            Route::post('connexion', 'AuthController@postLogin')->name('user.postLogin');
            Route::post('inscription', 'AuthController@postRegister')->name('user.postRegister');
        });
        // Profil privé
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', 'UserController@getProfile');
            Route::post('/', 'UserController@postProfile');
        });
        // Profil public
        Route::get('{name}', 'UserController@getUser')->name('user.getUser');
    });

    // Carrière Halo 5
    Route::group(['prefix' => 'halo5'], function () {
        Route::get('/', 'HaloController@index')->name('halo.getHome');
        Route::post('/', 'HaloController@postGamertag')->name('halo.postGamertag');
        // Comparaison de joueurs
        Route::group(['prefix' => 'compare/{gamertag1}-{gamertag2}'], function () {
            Route::get('/', 'HaloController@getCareer')->name('halo.getCompareCareer');
            // Statistiques
            Route::get('/arena', 'HaloController@getArena')->name('halo.getCompareArena');
            Route::get('/warzone', 'HaloController@getWarzone')->name('halo.getCompareWarzone');
            // Arena par défaut, Warzone optionnel
            Route::get('/medals', 'HaloController@getMedals')->name('halo.getCompareMedals');
            Route::get('/weapons', 'HaloController@getWeapons')->name('halo.getCompareWeapons');
        });
        // Gamertag
        Route::group(['prefix' => '{gamertag}'], function () {
            Route::get('/', 'HaloController@getCareer')->name('halo.getCareer');
            // Statistiques
            Route::get('/arena', 'HaloController@getArena')->name('halo.getArena');
            Route::get('/warzone', 'HaloController@getWarzone')->name('halo.getWarzone');
            // Arena par défaut, Warzone optionnel
            Route::get('/medals', 'HaloController@getMedals')->name('halo.getMedals');
            Route::get('/weapons', 'HaloController@getWeapons')->name('halo.getWeapons');
            Route::get('/history', 'HaloController@getGames')->name('halo.getGames');

            Route::get('/history/{matchId}', 'HaloController@getMatch')->name('halo.getMatch');
        });
    });

    // Forum
    Route::group(['prefix' => 'forum'], function () {
        // Categories
        Route::get('/', 'ForumController@getForum')->name('forum.getForum');
        Route::get('/post', 'ForumController@getForumRedactor')->name('forum.getForumRedactor');
        Route::post('/', 'ForumController@postForum')->name('forum.postForum');
        // Tags
        Route::group(['prefix' => '/tag/{slug}'], function () {
            Route::get('/', 'ForumController@getTag')->name('forum.getTag');
            Route::get('/post', 'ForumController@getTagRedactor')->name('forum.getTagRedactor');
            Route::post('/', 'ForumController@postTag')->name('forum.postTag');
        });
        // Sujets
        Route::group(['prefix' => '/sujet/{id}-{slug}'], function () {
            Route::get('/', 'ForumController@getTopic')->name('forum.getTopic');
            Route::get('/post', 'ForumController@getTopicRedactor')->name('forum.getTopicRedactor');
            Route::post('/', 'ForumController@postTopic')->name('forum.postTopic');
        });
        // Validation sondage
        Route::post('/poll/{id}', 'ForumController@postPoll')->name('forum.postPoll');
    });

    // Lobbies
    Route::group(['prefix' => 'lobby'], function () {
        Route::get('/', 'LobbiesController@index')->name('lobby.getHome');
    });
});
