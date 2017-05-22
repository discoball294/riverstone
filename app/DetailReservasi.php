<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailReservasi extends Model
{
    protected $table = 'detail_reservasi';
    protected $fillable = ['reservasi_id', 'room_id', 'check_in', 'checkout', 'harga'];
}
