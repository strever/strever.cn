<?php

Route::group(['domain' => 'admin.' . env('APP_TOP_DOMAIN'), 'namespace' => 'Admin'], function() {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');


    Route::group(['middleware' => 'auth'], function() {
        Route::resource('article', 'ArticleController');
    });


    Route::get('/', 'ArticleController@create')->middleware('auth');

    Route::get('/article/{slug}', 'ArticleController@create')->name('resume')->middleware('auth');

});

Route::group(['domain' => 'admin.' . env('APP_TOP_DOMAIN')], function() {

    Route::get('/resume/{slug}', 'ArticleController@detail')->where('slug', 'resume')->name('resume')->middleware('auth');

});
