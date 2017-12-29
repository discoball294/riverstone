<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambar';
    protected $fillable = ['id_kategori','id_gambar_kamar'];


}
