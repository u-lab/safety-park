<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
