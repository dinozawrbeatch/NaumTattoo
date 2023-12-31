<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $client_name
 * @property string $grade
 * @property string $text
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereText($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'client_name',
        'grade',
        'text',
    ];

    const MODEL_NAME = 'Отзывы';
    const MODEL_LINK = 'reviews';
    const FIELDS = [
        'id' => '№',
        'client_name' => 'Имя клиента',
        'grade' => 'Оценка',
        'text' => 'Текст отзыва',
    ];

    public static function getGradeMarks(): array
    {
        return range(1,5);
    }
}
