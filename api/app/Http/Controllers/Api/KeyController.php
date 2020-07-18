<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeyController extends Controller
{

    public function generate(Request $request)
    {
        $name = $request->name;
        $uuid = Str::uuid();

        User::create([
            'token' => $uuid,
            'name'  => $name
        ]);

        return [
            "data" => [
                'token' => $uuid,
                'name'  => $name
            ]
        ];
    }
}
