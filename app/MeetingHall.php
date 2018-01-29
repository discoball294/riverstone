<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MeetingHall
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $gambar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereDeskripsi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereGambar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MeetingHall whereUpdatedAt($value)
 */
class MeetingHall extends Model
{
    public $table = 'meeting_hall';
    protected $fillable = ['nama','deskripsi','gambar'];
}
