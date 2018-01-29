<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Room
 *
 * @property-read \App\RoomCategory $roomType
 * @mixin \Eloquent
 * @property int $id
 * @property int $room_category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Room whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Room whereRoomCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Room whereUpdatedAt($value)
 */
class Room extends Model
{
    protected $table = 'room';
    protected $fillable = ['room_category_id'];

    public function roomType(){
        return $this->belongsTo(RoomCategory::class,'room_category_id');
    }

}
