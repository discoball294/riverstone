<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingHall extends Model
{
    public $table = 'meeting_hall';
    protected $fillable = ['nama','deskripsi','gambar'];
}
