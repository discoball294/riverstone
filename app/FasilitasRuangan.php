<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FasilitasRuangan extends Model
{
    protected $table = 'fasilitas_ruangan';
    protected $fillable = ['room_category_id','fasilitas_id'];
}
