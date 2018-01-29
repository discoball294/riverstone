<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DetailReservasi
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $reservasi_id
 * @property int $room_id
 * @property string $check_in
 * @property string $check_out
 * @property int $harga
 * @property int $subtotal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereCheckIn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereCheckOut($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereHarga($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereReservasiId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereRoomId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereSubtotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DetailReservasi whereUpdatedAt($value)
 */
class DetailReservasi extends Model
{
    protected $table = 'detail_reservasi';
    protected $fillable = ['id','reservasi_id', 'room_id', 'check_in', 'checkout', 'harga','subtotal'];

}
