<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//->middlewareによってtokenない場合は先にエラー返すようになっている
// ユーザー位置情報取得 API仕様書の114行目
Route::get('/v1/user/location', 'Api\UserLocationController@index')->middleware('exsit.token');//利用するmiddlewareを呼び出す処理 青本p111

// ユーザー位置情報記録 API仕様書の142行目
Route::post('/v1/user/location', 'Api\UserLocationController@create')->middleware('exsit.token');

// ユーザー位置情報更新 API仕様書の177行目
Route::patch('/v1/user/location/{location_id}', 'Api\UserLocationController@update')->middleware('exsit.token');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
