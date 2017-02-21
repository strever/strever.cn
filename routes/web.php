<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['domain' => 'strever.dev'], function() {

    Route::get('/', 'ArticleController@index');

    Route::get('/article/slug/{slug}', 'ArticleController@detail')->where('slug', '[A-Za-z_-]+');

});

Route::group(['domain' => 'www.strever.dev'], function() {
    Route::resource('/article', 'ArticleController');
});

