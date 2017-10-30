<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    protected $fillable = ['room_category_id','max_person'];

    public function roomType(){
        return $this->belongsTo(RoomCategory::class,'room_category_id');
    }
    public function scopeJoinRoomCategory($query){
        $query->leftJoin('room_category', 'room.room_category_id', '=', 'room_category.id')->addSelect('room_category.*');
    }

}
