<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Carbon\Carbon;


class GraphController extends Controller
{
    //前日の各公園の1時間ごとの利用者取得API
    public function show(Request $request){
        $yesterday = Carbon::yesterday();; //前日を取得
        \Log::debug($yesterday);
        $user_locations = UserLocation::whereDate('start_time','=', $yesterday)->where('park_id', '=', $request->park_id)->get();//requestから送られてくるidがpark_id
        $hours=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//return用の配列を初期化→最初は全時間0で足していく方式

        //foreachで多次元配列から一つずつ配列取り出す。
        foreach($user_locations as $user_location){
            //取り出した配列から必要なもの抜き取る
            $start_time = new Carbon($user_location->start_time);//start_timeをcarbon型にする
            $start_time = $start_time->hour;//start_timeから時間だけ取り出す
            $end_time = new Carbon($user_location->end_time);//end_timeをcarbon型にする
            $end_time = $end_time->hour;//end_timeから時間だけ取り出す
            $diff =$end_time -$start_time;//時間差計算
            if ($start_time <=$end_time){
                //日付越さないとき→start_timeの時間からend_timeの時間まで加算
                foreach(range($start_time,$end_time) as $hour){
                    $number_of_people = $user_location->number_of_people;//人数取り出す
                    $hours[$hour] += $number_of_people;//時間に該当する配列の要素に人数を足す
                  }
            }
            else{
                //日付超す時→start_timeの時間から23時まで加算
                foreach(range($start_time,23) as $hour){
                    $number_of_people = $user_location->number_of_people;//人数取り出す
                    $hours[$hour] += $number_of_people;//時間に該当する配列の要素に人数を足す
                  }

            }
            


        }

        
        return $hours;

    }
}
