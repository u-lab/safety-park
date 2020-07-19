<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UserLocationRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'park_id' => 'required | integer | gte:1',
            'longitude' => 'required | numeric',
            'latitude' => 'required | numeric',
            'number_of_people'=>'integer | gte:1',
            'time_diff'=>'integer | gte:1',
            'start_time'=>'date',
            'end_time'=>'date | after:start_time',
        ];
    }

    /**
     *
     * 空白のための処理 laravel6以降で追加されたprotected function prepareForValidation()を使う
     */
    protected function prepareForValidation()
    {
        //注意→$requestでは取り出せない！！！！！！ $thisを使うこと。
        //これはモダンなnull合体演算子。 ??の前がnullだったら??より右を採用するらしい
        $number_of_people = $this->number_of_people ?? 1;//人数、デフォルトは１
        $start_time = $this->start_time ?? new Carbon();//開始時刻 デフォルト値は現在時刻
                    
        $for_plus_one_hour =new Carbon();
        $end_time = $this->end_time ?? $for_plus_one_hour->addHours(1);//終了時刻 デフォルト値は開始時刻の1時間後

        /** 
         * はじめは$end_time = $start_time->addHours(1);としていたがこうすると
         * start_timeまで1時間たされてしまうので別途変数に入れてから操作することにした。
         * リクエストからの値はstring型であり、new Carbonを使うことでobject型に変換している。
         * なぜ上でnew Carbonせず、この下でやっているか→→上でnew Carbonすると addHours(1)がちゃんと加算されないバグが起こるためである。
        */
        $time_diff = $this->time_diff ?? (new Carbon($start_time))->diffInMinutes(new Carbon($end_time));//時間幅、デフォルト値は終わりの時刻-始まりの時刻
        $this->merge([
            'number_of_people'=>$number_of_people,
            'time_diff'=>$time_diff,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
         ]);

    }
}
