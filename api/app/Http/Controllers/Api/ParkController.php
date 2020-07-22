<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Park;

class ParkController extends Controller
{
    public function look(Request $request){

        $pre_number = $request->pre_number;

        switch($pre_number){
            case 1:
                $word = '北海道';
                break;
            case 2:
                $word = '青森県';
                break;
            case 3:
                $word = '岩手県';
                break;
            case 4:
                $word = '宮城県';
                break;
            case 5:
                $word = '秋田県';
                break;
            case 6:
                $word = '山形県';
                break;
            case 7:
                $word = '福島県';
                break;
            case 8:
                $word = '茨城県';
                break;
            case 9:
                $word = '栃木県';
                break;
            case 10:
                $word = '群馬県';
                break;
            case 11:
                $word = '埼玉県';
                break;
            case 12:
                $word = '千葉県';
                break;
            case 13:
                $word = '東京都';
                break;
            case 14:
                $word = '神奈川県';
                break;
            case 15:
                $word = '新潟県';
                break;
            case 16:
                $word = '富山県';
                break;
            case 17:
                $word = '石川県';
                break;
            case 18:
                $word = '福井県';
                break;
            case 19:
                $word = '山梨県';
                break;
            case 20:
                $word = '長野県';
                break;
            case 21:
                $word = '岐阜県';
                break;
            case 22:
                $word = '静岡県';
                break;
            case 23:
                $word = '愛知県';
                break;
            case 24:
                $word = '三重県';
                break;
            case 25:
                $word = '滋賀県';
                break;
            case 26:
                $word = '京都府';
                break;
            case 27:
                $word = '大阪府';
                break;
            case 28:
                $word = '兵庫県';
                break;
            case 29:
                $word = '奈良県';
                break;
            case 30:
                $word = '和歌山県';
                break;
            case 31:
                $word = '鳥取県';
                break;
            case 32:
                $word = '島根県';
                break;
            case 33:
                $word = '岡山県';
                break;
            case 34:
                $word = '広島県';
                break;
            case 35:
                $word = '山口県';
                break;
            case 36:
                $word = '徳島県';
                break;
            case 37:
                $word = '香川県';
                break;
            case 38:
                $word = '愛媛県';
                break;
            case 39:
                $word = '高知県';
                break;
            case 40:
                $word = '福岡県';
                break;
            case 41:
                $word = '佐賀県';
                break;
            case 42:
                $word = '長崎県';
                break;
            case 43:
                $word = '熊本県';
                break;
            case 44:
                $word = '大分県';
                break;
            case 45:
                $word = '宮崎県';
                break;
            case 46:
                $word = '鹿児島県';
                break;
            case 47:
                $word = '沖縄県';
                break;
            default:
                $word = 'なし';
                
        }
        
        $park = Park::where('adm', '=', $word)->take(10)->get();

        return $park;
    }

    public function coLook(Request $request){


    }

}
