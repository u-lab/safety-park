<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GraphController extends Controller
{
    public function show(Request $request){
        $yesterday = new Carbon('yesterday'); //前日を取得
        $user_location = UserLocation::whereDay('start_time','=', $yesterday)->where('park_id', '=', $request->park_id)->all();
        $hours=[];//return用の配列を初期化
        \Log::debug($user_location);
        
        return $hours;

    }
}
