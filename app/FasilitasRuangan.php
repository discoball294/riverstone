<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FasilitasRuangan
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $room_category_id
 * @property int $fasilitas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\FasilitasRuangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FasilitasRuangan whereFasilitasId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FasilitasRuangan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FasilitasRuangan whereRoomCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FasilitasRuangan whereUpdatedAt($value)
 */
class FasilitasRuangan extends Model
{
    protected $table = 'fasilitas_ruangan';
    protected $fillable = ['room_category_id','fasilitas_id'];
}
