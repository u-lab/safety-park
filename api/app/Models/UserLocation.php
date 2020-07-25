<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Eloquentを使ったデータの操作
/**
 * App\Models\UserLocation
 *
 * @property int $id
 * @property int $user_id
 * @property int $park_id
 * @property float $latitude
 * @property float $longitude
 * @property int $number_of_people
 * @property int $time_diff
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereNumberOfPeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereParkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereTimeDiff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLocation whereUserId($value)
 * @mixin \Eloquent
 */
class UserLocation extends Model
{
    //protectedは値を用意しなくてもOKな仕組み nullでもエラーでない p256
    protected $fillable = [
        'user_id', 'park_id','longitude','latitude' ,'number_of_people','time_diff','start_time','end_time'
    ];
}
