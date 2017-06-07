<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = ['nama','email','no_telp','status','transfer_to'];

    public function roomReservation(){
        return $this->belongsToMany(Room::class,'detail_reservasi')->withPivot('harga','subtotal','check_in','check_out')->withTimestamps();
    }
}
