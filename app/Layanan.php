<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Layanan
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $gambar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereDeskripsi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereGambar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Layanan whereUpdatedAt($value)
 */
class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = ['nama','deskripsi','gambar'];
}
