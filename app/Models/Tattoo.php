<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tattoo
 *
 * @property int $id
 * @property string $image
 * @property string $format
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tattoo whereImage($value)
 * @mixin \Eloquent
 */
class Tattoo extends Model
{
    use HasFactory;

    protected $table = 'tattoos';
}
