<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Master
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|Master newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master query()
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereName($value)
 * @mixin \Eloquent
 */
class Master extends Model
{
    use HasFactory;

    protected $table = 'masters';
}
