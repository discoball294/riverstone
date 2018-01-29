<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pengumuman
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $judul
 * @property string $pengumuman
 * @property string $tanggal
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereJudul($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman wherePengumuman($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pengumuman whereUpdatedAt($value)
 */
class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable = ['judul', 'pengumuman', 'tanggal', 'status'];
}
