<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Fasilitas[] $fasilitas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GambarKamar[] $gambar
 * @mixin \Eloquent
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property int $harga
 * @property int $max_person
 * @property int $val_rooms
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereDeskripsi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereHarga($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereMaxPerson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RoomCategory whereValRooms($value)
 */
class RoomCategory extends Model
{
    protected $table = 'room_category';
    protected $fillable = ['nama', 'deskripsi', 'harga', 'max_person', 'val_rooms'];

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_ruangan')->withTimestamps();
    }

    public function gambar()
    {
        return $this->hasMany(GambarKamar::class, 'id_kategori');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($room_categories) {
            $room_categories->gambar()->delete();
        });
    }
}
