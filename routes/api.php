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

Route::group(['domain' => 'api.' . env('APP_TOP_DOMAIN'), 'namespace' => 'Api'], function() {

    //登录接口，获取jwt token
    Route::post('/authenticate', 'AuthenticateController@authenticate');

    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::resource('/article', 'ArticleController');
    });

});

/*
$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function($api) {

    $api->get('articles/{id}', 'App\Api');


    //需要验证的接口
    $api->group(['middleware' => 'auth:api'], function($api) {

    });
});
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/
