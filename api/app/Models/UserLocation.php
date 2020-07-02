<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Eloquentを使ったデータの操作
class UserLocation extends Model
{
    //protectedは値を用意しなくてもOKな仕組み nullでもエラーでない p256
    protected $fillable = [
        'user_id', 'park_id', 'latitude', 'longitude'
    ];
}
