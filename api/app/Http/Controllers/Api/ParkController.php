<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Park;

class ParkController extends Controller
{
    public function index(Request $request)
    {

    }

    public function show(Request $request,$location_id)
    {
        //Laravel-hands-onをそのまま持ってきました
        //findメソッドp243 引数は検索するID番号
        $park = Park::find($location_id);
        $user_locations = $park->user_location;//←こんなのない

        // 人数取得
        $count = count($user_locations);
        
        //dataに配列として渡す
        return [
            'data' => [
                'id' => $park->id,
                'name' => $park->name,
                'count' => $count,
                'people' => $user_locations
            ]
        ];
    }
    
}
