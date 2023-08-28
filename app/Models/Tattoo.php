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
    protected $fillable = [
        'image',
        'format'
    ];

    const MODEL_NAME = 'Тату';
    const MODEL_LINK = 'tattoos';
    const FIELDS = [
        'id' => '№',
        'image' => 'Фото',
        'format' => 'Формат изображения',
    ];
    const IMAGE_FORMATS = [
        'square' => 'Квадрат',
        'tall' => 'Прямоугольник(вертикальный)',
        'wide' => 'Прямоугольник(горизонтальный)',
    ];
}
