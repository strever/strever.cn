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

Route::group(['domain' => 'admin.strever.dev', 'namespace' => 'Admin'], function() {
    Route::resource('article', 'Article');
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
