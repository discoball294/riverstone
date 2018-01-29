<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Banner
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $gambar
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereGambar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereUpdatedAt($value)
 */
class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['gambar','text'];
}
