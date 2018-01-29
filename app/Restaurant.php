<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Restaurant
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $gambar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereDeskripsi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereGambar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Restaurant whereUpdatedAt($value)
 */
class Restaurant extends Model
{
    protected $table = 'restaurant';
    protected $fillable = ['nama','deskripsi','gambar'];
}
