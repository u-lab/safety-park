<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {

        $user = User::where('token', '=', $token)->first();

        return [
            "data" => [
                "name" => $user->name
            ]
        ];
    }
      public function update(Request $request)
    {
    
        // 取得
        $name = $request->name;

        $user = User::where('token', '=', $token)->first();
        // 更新
        $user->update([
            'name' => $name
        ]);

        return [
            "data" => [
                "name" => $user->name
            ]
        ];
    }
}
