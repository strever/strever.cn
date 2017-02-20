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
    //Route::resource('/article', 'Article');

    Route::get('/', 'ArticleController@index');

    Route::get('/article/{title}/slug/{slug}', 'ArticleController@detail');

});

Route::group(['domain' => 'www.strever.dev'], function() {
    Route::resource('/article', 'Article');
});

