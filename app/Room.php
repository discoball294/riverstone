<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    protected $fillable = ['room_category_id'];

    public function roomType(){
        return $this->belongsTo(RoomCategory::class,'room_category_id');
    }

}
