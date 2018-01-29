<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TipeContact
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $tipe
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TipeContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipeContact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipeContact whereTipe($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipeContact whereUpdatedAt($value)
 */
class TipeContact extends Model
{
    protected $table = 'tipe_contact';
    protected $fillable = ['tipe'];
}
