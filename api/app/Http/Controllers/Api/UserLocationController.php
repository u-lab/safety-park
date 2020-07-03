<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;

class UserLocationController extends Controller
{
    //// ユーザー位置情報取得
    public function index(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる
        $user = User::where('remember_token', '=', $token)->first(); //userの照合 データベースから一致するもの取り出す
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

        $user = User::where('remember_token', '=', $token)->first();//userの照合　データベースから一致するもの取り出す

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
        $token = $request->header('X-API-TOKEN');//Tokenひろう
        $user = User::where('remember_token', '=', $token)->first();//tokenに該当するユーザー持ってくる 勉強会のときtoken→今回remember_token
        $user_location = UserLocation::where('id', '=', $user->id)->first();//User_locationsとidを照合
        //whereの前はモデルクラス←モデルクラスはEloquent関連のものでテーブルの単数形
        //入力された値を変数に入れる
        $park_id = $location_id;//どっちを保存すべき？
        $park_id = $request->parkID;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $end_time=$request->end_time;
        //更新の処理 tokenがおなじだったユーザーのデータベースを更新する
        $user_location->update([
            'park_id' => $park_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'end_time'=>$end_time,
        ]);

        return [
            "data" => [
                'park_id' => $user_location->park_id,
                'longitude' => $user_location->longitude,
                'latitude' => $user_location->latitude,
                'end_time'=>$user_location->end_time
            ]
        ];

    }
}
