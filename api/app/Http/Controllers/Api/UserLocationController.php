<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserLocationRequest;



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
    public function create(UserLocationRequest $request)
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
        $user_location = UserLocation::create($request->all());
        return [
            "data" => $user_location
        ];
        
    }
    // ユーザー位置情報更新 UserLocationUpdate
    public function update(UserLocationRequest $request)
    {
        $token = $request->header('X-API-TOKEN');//Tokenひろう
        $user = User::where('remember_token', '=', $token)->first();//tokenに該当するユーザー持ってくる 勉強会のときtoken→今回remember_token
        $user_location = UserLocation::where('user_id', '=', $user->id)->latest()->first();
        //↑について User_locationsとidを照合 latestでそのひとのcreated at が最新のものを選ぶ first で取り出す
        //whereの前はモデルクラス←モデルクラスはEloquent関連のものでテーブルの単数形

        
        /*** 
         * requestから来た連想配列から取り出していく 後ほどrequestメソッドと同じにしました。
        */
        //$request無いと変数名が同じで、コントローラーでの処理もないため、allでそのまま代入できる。
        $user_location->update($request->all());

        return [
            "data" => $user_location
        ];

    }
}
