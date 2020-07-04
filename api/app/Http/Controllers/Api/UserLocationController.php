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
    // ユーザー位置情報更新POST
    public function create(UserLocationCreateRequest $request)
    {
        /*** 
         * ユーザーを判別
        */
        $token = $request->header('X-API-TOKEN');
        $user = User::where('remember_token', '=', $token)->first();//userの照合 データベースから一致するもの取り出す
        $user_location = UserLocation::where('id', '=', $user->id)->first();//User_locationsとidを照合
        /*** 
         * requestから来た連想配列から取り出していく
        */

        $park_id = $request->parkID;
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
            $start_time = Carbon::now();//laravelに入っている時間取得のCarbonというライブラリを使いました。
        }else{
            $start_time=$request->start_time;
        }
        //終了時刻 デフォルト値は開始時刻の1時間後
        if (empty($request->end_time))
        {
            //デフォルト値は1時間後
            $end_time = $start_time->addHours(1);
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
            'park_id' => $park_id,
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
    // ユーザー位置情報更新
    public function update(UserLocationUpdateRequest $request)
    {
        $token = $request->header('X-API-TOKEN');//Tokenひろう
        $user = User::where('remember_token', '=', $token)->first();//tokenに該当するユーザー持ってくる 勉強会のときtoken→今回remember_token
        $user_location = UserLocation::where('id', '=', $user->id)->first();//User_locationsとidを照合
        //whereの前はモデルクラス←モデルクラスはEloquent関連のものでテーブルの単数形


        //入力された値を変数に入れる
        $park_id = $request->parkID;
        $number_of_people =$request->number_of_people;
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $time_diff=$request->time_diff;
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        
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
            "data" => [
                'park_id' => $user_location->park_id,
                'longitude' => $user_location->longitude,
                'latitude' => $user_location->latitude,
                'end_time'=>$user_location->end_time,
            ]
        ];

    }
}
