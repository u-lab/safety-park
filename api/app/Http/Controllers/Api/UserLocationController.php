<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserLocationCreateRequest;
use App\Http\Requests\Api\UserLocationUpdateRequest;
use Carbon\Carbon;

class UserLocationController extends Controller
{
    //// ユーザー位置情報取得GET
    public function index(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる
        $user = User::where('remember_token', '=', $token)->first(); //userの照合 データベースから一致するもの取り出す
        $user_location = UserLocation::where('user_id', '=', $user->id)->paginate(10);;//10件だけ取得する
        return $user_location;
    }
    // ユーザー位置情報更新POST UserLocationCreate
    public function create(UserLocationCreateRequest $request)
    {
        /*** 
         * ユーザーを判別
        */
        $token = $request->header('X-API-TOKEN');
        $user = User::where('remember_token', '=', $token)->first();//userの照合 データベースから一致するもの取り出す
        $user_location = UserLocation::where('user_id', '=', $user->id)->first();//User_locationsとidを照合
        /*** 
         * requestから来た連想配列から取り出していく
        */

        $park_id = $request->park_id;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $end_time=$request->end_time;
        /*** 
         * 入力されていなかった場合はデフォルト値設定するタイプのもの
        */

        //人数、デフォルトは１
        if (empty($request->number_of_people))
        {
            $number_of_people = 1;
        }else{
            $number_of_people =$request->number_of_people;
        }

        //開始時刻 デフォルト値は現在時刻
        if (empty($request->start_time))
        {
            $start_time = new Carbon();//laravelに入っている時間取得のCarbonというライブラリを使いました。
        }else{
            $start_time=$request->start_time;
        }
        //終了時刻 デフォルト値は開始時刻の1時間後
        if (empty($request->end_time))
        {
            //デフォルト値は1時間後 
            /** 
            はじめは$end_time = $start_time->addHours(1);としていたがこうすると
            start_timeまで1時間たされてしまうので別途変数に入れてから操作することにした。
            */
            $for_plus_one_hour =new Carbon();
            $end_time = $for_plus_one_hour->addHours(1);
        }else{
            $end_time=$request->end_time;
        }
        //時間幅、デフォルト値は60
        if (empty($request->time_diff))
        {
            //開始時刻終了時刻の時間差を取ることで何もうってない→60分 開始時刻終了時刻打ったが時間幅打ってない→時間幅を取得
            $time_diff = $start_time->diffInMinutes($end_time);//Carbonライブラリの機能使って時間差を分で出しています。
        }else{
            $time_diff=$request->time_diff;
        }


        /*** 
         * データベースへの追加
        */
        $user_location = UserLocation::create([
            'user_id' => $user->id,
            'park_id'=>$park_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'number_of_people'=>$number_of_people,
            'time_diff'=>$time_diff,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ]);
        return [
            "data" => $user_location
        ];
        
    }
    // ユーザー位置情報更新 UserLocationUpdate
    public function update(Request $request)
    {
        $token = $request->header('X-API-TOKEN');//Tokenひろう
        $user = User::where('remember_token', '=', $token)->first();//tokenに該当するユーザー持ってくる 勉強会のときtoken→今回remember_token
        $user_location = UserLocation::where('user_id', '=', $user->id)->first();//User_locationsとidを照合
        //whereの前はモデルクラス←モデルクラスはEloquent関連のものでテーブルの単数形

        
        /*** 
         * requestから来た連想配列から取り出していく 後ほどrequestメソッドと同じにしました。
        */

        $park_id = $request->park_id;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $end_time=$request->end_time;
        /*** 
         * 入力されていなかった場合はデフォルト値設定するタイプのもの
        */

        //人数、デフォルトは１
        if (empty($request->number_of_people))
        {
            $number_of_people = 1;
        }else{
            $number_of_people =$request->number_of_people;
        }

        //開始時刻 デフォルト値は現在時刻
        if (empty($request->start_time))
        {
            $start_time = new Carbon();//laravelに入っている時間取得のCarbonというライブラリを使いました。
        }else{
            $start_time=$request->start_time;
        }
        //終了時刻 デフォルト値は開始時刻の1時間後
        if (empty($request->end_time))
        {
            //デフォルト値は1時間後 
            /** 
            はじめは$end_time = $start_time->addHours(1);としていたがこうすると
            start_timeまで1時間たされてしまうので別途変数に入れてから操作することにした。
            */
            $for_plus_one_hour =new Carbon();
            $end_time = $for_plus_one_hour->addHours(1);
        }else{
            $end_time=$request->end_time;
        }
        //時間幅、デフォルト値は60
        if (empty($request->time_diff))
        {
            //開始時刻終了時刻の時間差を取ることで何もうってない→60分 開始時刻終了時刻打ったが時間幅打ってない→時間幅を取得
            $time_diff = $start_time->diffInMinutes($end_time);//Carbonライブラリの機能使って時間差を分で出しています。
        }else{
            $time_diff=$request->time_diff;
        }
        
        //更新の処理 tokenがおなじだったユーザーのデータベースを更新する
        $user_location->update([
            'park_id' => $park_id,
            'number_of_people' => $number_of_people,
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
}
