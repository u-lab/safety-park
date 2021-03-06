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
Route::post('/v1/key', 'Api\KeyController@generate');// 端末 API KEY 生成
Route::get('/v1/user', 'Api\UserController@show'); //ユーザー情報取得
Route::patch('/v1/user', 'Api\UserController@update'); //ユーザー情報更新
//->middlewareによってtokenない場合は先にエラー返すようになっている
// ユーザー位置情報取得 API仕様書の114行目
Route::get('/v1/user/location', 'Api\UserLocationController@index')->middleware('exsit.token');//利用するmiddlewareを呼び出す処理 青本p111
// ユーザー位置情報記録？更新? API仕様書の142行目
Route::post('/v1/user/location', 'Api\UserLocationController@create')->middleware('exsit.token');
 // ユーザー位置情報更新 API仕様書の177行目
 Route::patch('/v1/user/location', 'Api\UserLocationController@update')->middleware('exsit.token');

 // 都道府県ごとの公園一覧を取得
 Route::get('/v1/park', 'Api\ParkController@catalog');

 // 公園個別の混雑状況を確認
 Route::get('/v1/park/{id}', 'Api\ParkController@research');

//前日の各公園の1時間ごとの利用者取得API
Route::get('/v1/graph/{park_id}','Api\GraphController@show');

