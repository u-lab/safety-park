<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Park;
use Illuminate\Support\Carbon;

class ParkController extends Controller
{
    public function catalog(Request $request){

        // 入力された県コードを取得
        // pre_number 県コード
        $pre_number = $request->pre_number;

        // 県コードを実際の県名に変更
        // pre_word 県の名前
        switch($pre_number){
            case 1:
                $pre_word = '北海道';
                break;
            case 2:
                $pre_word = '青森県';
                break;
            case 3:
                $pre_word = '岩手県';
                break;
            case 4:
                $pre_word = '宮城県';
                break;
            case 5:
                $pre_word = '秋田県';
                break;
            case 6:
                $pre_word = '山形県';
                break;
            case 7:
                $pre_word = '福島県';
                break;
            case 8:
                $pre_word = '茨城県';
                break;
            case 9:
                $pre_word = '栃木県';
                break;
            case 10:
                $pre_word = '群馬県';
                break;
            case 11:
                $pre_word = '埼玉県';
                break;
            case 12:
                $pre_word = '千葉県';
                break;
            case 13:
                $pre_word = '東京都';
                break;
            case 14:
                $pre_word = '神奈川県';
                break;
            case 15:
                $pre_word = '新潟県';
                break;
            case 16:
                $pre_word = '富山県';
                break;
            case 17:
                $pre_word = '石川県';
                break;
            case 18:
                $pre_word = '福井県';
                break;
            case 19:
                $pre_word = '山梨県';
                break;
            case 20:
                $pre_word = '長野県';
                break;
            case 21:
                $pre_word = '岐阜県';
                break;
            case 22:
                $pre_word = '静岡県';
                break;
            case 23:
                $pre_word = '愛知県';
                break;
            case 24:
                $pre_word = '三重県';
                break;
            case 25:
                $pre_word = '滋賀県';
                break;
            case 26:
                $pre_word = '京都府';
                break;
            case 27:
                $pre_word = '大阪府';
                break;
            case 28:
                $pre_word = '兵庫県';
                break;
            case 29:
                $pre_word = '奈良県';
                break;
            case 30:
                $pre_word = '和歌山県';
                break;
            case 31:
                $pre_word = '鳥取県';
                break;
            case 32:
                $pre_word = '島根県';
                break;
            case 33:
                $pre_word = '岡山県';
                break;
            case 34:
                $pre_word = '広島県';
                break;
            case 35:
                $pre_word = '山口県';
                break;
            case 36:
                $pre_word = '徳島県';
                break;
            case 37:
                $pre_word = '香川県';
                break;
            case 38:
                $pre_word = '愛媛県';
                break;
            case 39:
                $pre_word = '高知県';
                break;
            case 40:
                $pre_word = '福岡県';
                break;
            case 41:
                $pre_word = '佐賀県';
                break;
            case 42:
                $pre_word = '長崎県';
                break;
            case 43:
                $pre_word = '熊本県';
                break;
            case 44:
                $pre_word = '大分県';
                break;
            case 45:
                $pre_word = '宮崎県';
                break;
            case 46:
                $pre_word = '鹿児島県';
                break;
            case 47:
                $pre_word = '沖縄県';
                break;
            default:
                $word = 'なし';
                
        }

        // 与えられた県コードから公園を取得
        // park_list 公園一覧リスト
        $park_list = Park::where('adm', '=', $pre_word)->pagenation(10);

        return $park_list;
    }

    public function research(Request $request){

        $datatime = new Carbon('now');
        
        $time_now = date('Y-m-d H:i:s',strtotime($datatime));
        $time_end = date('Y-m-d H:i:s',strtotime('+1 hour'));


        // 確認したい公園の個別idを取得
        $park_id = $request->id;

        // location_log 個別idの公園に行った人の取得
        // AND検索を行って細かく検索するようにしたい
        $location_log = UserLocation::where('park_id',$park_id)
        ->where('start_time','<',$time_now)
        ->where('end_time','>',$time_end)
        ->get();

        $sum_people = 0;


        // 目的に合ったlocation_userをまとめたら人数を足し合わせていく
        foreach($location_log as $value){
            $sum_people += $value->number_of_people;
        }

        $park_info = Park::find($park_id);

        $park_info['people_num'] = $sum_people;

        return [
            "data" => $park_info
        ];


    }

}
