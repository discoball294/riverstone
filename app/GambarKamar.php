<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarKamar extends Model
{
    protected $table = 'gambar_kamar';
    protected $fillable = ['id_kategori','alt','url'];

    public function kamar(){
        $this->belongsToMany(RoomCategory::class,'gambar');
    }


}
