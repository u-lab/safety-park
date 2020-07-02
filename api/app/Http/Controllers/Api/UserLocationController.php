<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use App\User;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    //// ユーザー位置情報取得
    public function index(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる
        $user = User::where('token', '=', $token)->first(); //userの照合　データベースから一致するもの取り出す
        $user_location = UserLocation::where('user_id', '=', $user->id)->paginate(10);;//10件だけ取得する
        return $user_location;
    }
    // ユーザー位置情報記録
    public function create(Request $request)
    {
        $token = $request->header('X-API-TOKEN');
        //requestから来た連想配列から取り出していく
        $park_id = $request->parkID;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        //$number_of_people=$request->$request->latitude;
        $time_diff=$request->time_diff;
        $start_time=$request->start_time;
        $end_time=$request->end_time;

        $user = User::where('token', '=', $token)->first();//userの照合　データベースから一致するもの取り出す

        //データベースに入れる作業をしていると思われる↓
        $user_location = UserLocation::create([
            'user_id' => $user->id,
            'park_id' => $park_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'time_diff'=>$time_diff,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ]);

        return [
            "data" => $user_location
        ];
    }
    // ユーザー位置情報更新
    public function update(Request $request,$location_id)
    {
        $token = $request->header('X-API-TOKEN');
        $user = User::where('token', '=', $token)->first();//tokenに該当するユーザー持ってくる

        //入力された値を変数に入れる
        $park_id = $location_id;
        $park_id = $request->parkID;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $end_time=$request->end_time;
        //更新の処理 tokenがおなじだったユーザーのデータベースを更新する
        $user->update([
            'park_id' => $park_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'end_time'=>$end_time,
        ]);

        return [
            "data" => [
                'park_id' => $user->park_id,
                'longitude' => $user->longitude,
                'latitude' => $user->latitude,
                'end_time'=>$end_time,
            ]
        ];

    }
}
