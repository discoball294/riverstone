<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fasilitas
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $fasilitas
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Fasilitas whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fasilitas whereFasilitas($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fasilitas whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fasilitas whereUpdatedAt($value)
 */
class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $fillable = ['fasilitas'];
}
