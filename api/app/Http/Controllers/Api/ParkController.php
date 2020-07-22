<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    public function look(Request $request){
        $pre_number = $request->pre_number;

        return $pre_number;
    }
}
