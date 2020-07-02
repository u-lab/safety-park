<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use App\User;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる
        $user = User::where('token', '=', $token)->first(); //userの照合　データベースから一致するもの取り出す
        $user_location = UserLocation::where('user_id', '=', $user->id)->paginate(10);;//10件だけ取得する
        return $user_location;
    }

    public function create(Request $request)
    {
        $token = $request->header('X-API-TOKEN');

        $park_id = $request->parkID;//requestから来た配列から取り出していく
        $longitude = $request->longitude;
        $latitude = $request->latitude;

        $user = User::where('token', '=', $token)->first();//userの照合　データベースから一致するもの取り出す

        //データベースをここで作っている？
        $user_location = UserLocation::create([
            'user_id' => $user->id,
            'park_id' => $park_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
    }
}
