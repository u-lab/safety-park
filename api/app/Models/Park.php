<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Park
 *
 * @property int $id
 * @property string $adm 管轄団体名（都道府県・地方整備局）
 * @property string $lgn 管理団体名（市区町村)
 * @property string|null $nop 都市公園の名称
 * @property string|null $kdp 公園種別コード
 * @property string|null $pop 都市公園の所在地名（都道府県）
 * @property string|null $cop 都市公園の所在地名（市区町村）
 * @property int|null $timePosition 供用開始した年（西暦）
 * @property int|null $opa 供用開始最終開設面積（m2）
 * @property float $latitude 緯度
 * @property float $longitude 経度
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereAdm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereCop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereKdp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereLgn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereNop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereOpa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park wherePop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereTimePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Park whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Park extends Model
{
}
