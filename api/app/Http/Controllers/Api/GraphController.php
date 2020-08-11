<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Carbon\Carbon;


class GraphController extends Controller
{
    public function show(Request $request){
        $yesterday = Carbon::yesterday();; //前日を取得
        \Log::debug($yesterday);
        $user_location = UserLocation::whereDate('start_time','=', $yesterday)->where('park_id', '=', $request->id)->get();//requestから送られてくるidがpark_id
        $hours=[];//return用の配列を初期化
        \Log::debug($user_location);
        
        return $hours;

    }
}
