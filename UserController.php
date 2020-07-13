<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $token = $request->header('X-API-TOKEN');

        if (empty($token)) {
            return abort('401'); // エラー
        }

        $user = User::where('token', '=', $token)->first();

        return [
            "data" => [
                "name" => $user->name
            ]
        ];
    }

    public function update(Request $request)
    {
        $token = $request->header('X-API-TOKEN');


        if (empty($token)) {

            return abort('401'); // 認証エラー
        }

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
