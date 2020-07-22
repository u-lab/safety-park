<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Park extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * 更新を許可するものを入れる
     *
     * @var array
     */
    protected $fillable = [
        'adm', 'lgn','nop', 'kdp', 'pop', 'cop', 'timePosition', 'opa', 'latitude', 'longitude'
    ];
}
