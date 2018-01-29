<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gambar
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $id_kategori
 * @property int $id_gambar_kamar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Gambar whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gambar whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gambar whereIdGambarKamar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gambar whereIdKategori($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gambar whereUpdatedAt($value)
 */
class Gambar extends Model
{
    protected $table = 'gambar';
    protected $fillable = ['id_kategori','id_gambar_kamar'];


}
