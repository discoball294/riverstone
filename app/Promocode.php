<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'reward',
        'quantity',
        'is_used',
    ];
    public function reservasi(){
        return $this->hasMany(Reservasi::class,'promo_id');
    }
}
