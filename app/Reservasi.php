<?php

namespace App;

use Gabievi\Promocodes\Traits\Rewardable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Reservasi
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Room[] $roomReservation
 * @mixin \Eloquent
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $no_telp
 * @property string $status
 * @property string $transfer_to
 * @property int $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereNoTelp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereTransferTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservasi whereUpdatedAt($value)
 */
class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = ['nama','email','no_telp','status','transfer_to','total','promo_id'];

    public function roomReservation(){
        return $this->belongsToMany(Room::class,'detail_reservasi')->withPivot('harga','subtotal','check_in','check_out')->withTimestamps();
    }
    public function promo(){
        return $this->belongsTo(Promocode::class);
    }
}
