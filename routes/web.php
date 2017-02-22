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



Route::group(['domain' => env('APP_TOP_DOMAIN')], function() {

    Route::get('/', 'ArticleController@index');

    //文章详情页
    Route::get('/article/{slug}', 'ArticleController@detail')->where('slug', '[A-Za-z_-]+')->name('article.detail');

    //文章分类页
    Route::get('/category/{slug}', 'ArticleController@category')->where('slug', '[A-Za-z_-]+')->name('category');

});

Route::group(['domain' => 'www.strever.dev'], function() {
    Route::resource('/article', 'ArticleController');
});


//Auth::routes();
