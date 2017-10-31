<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $table = 'room_category';
    protected $fillable = ['nama','deskripsi','gambar','harga', 'max_person','val_rooms'];

    public function fasilitas(){
        return $this->belongsToMany(Fasilitas::class,'fasilitas_ruangan')->withTimestamps();
    }
}
