<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GambarKamar
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $id_kategori
 * @property string $alt
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereAlt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereIdKategori($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GambarKamar whereUrl($value)
 * @property-read \App\RoomCategory $kategori
 */
class GambarKamar extends Model
{
    protected $table = 'gambar_kamar';
    protected $fillable = ['id_kategori','alt','url'];

    public function kategori(){
        return $this->belongsTo(RoomCategory::class,'id_kategori');
    }
}
