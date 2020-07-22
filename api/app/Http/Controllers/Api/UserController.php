<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる

        $user = User::where('token', '=', $token)->first();

        return [
            "data" => [
                "name" => $user->name,
                "default_number" => $user->default_number
            ]
        ];
    }

    public function update(Request $request)
    {
        $token = $request->header('X-API-TOKEN'); //tokenを取ってくる

        // 取得
        $name = $request->name;
        $default_number = $request->default_number;

        $user = User::where('token', '=', $token)->first();
        // 更新
        $user->update([
            'name' => $name,
            'default_number' => $default_number
        ]);

        return [
            "data" => [
                "name" => $user->name,
                "default_number" => $user->default_number
            ]
        ];
    }
}
