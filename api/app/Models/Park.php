<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    //nameはnullでもエラーでない
    protected $fillable = [
        'name'
    ];
    public function user_location()
    {
        //has many リレーション 主テーブルから複数の従テーブルのレコードに関連付けるp279
        return $this->hasMany(UserLocation::class, 'park_id', 'id');    
    }
}
}
