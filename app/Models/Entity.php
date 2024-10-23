<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $api
 * @property string $description
 * @property string $link
 * @property Category $category
 *
 * @method static Builder|Entity newModelQuery()
 * @method static Builder|Entity newQuery()
 * @method static Builder|Entity query()
 *
 * @mixin \Eloquent
 */
class Entity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'api',
        'description',
        'link',
        'category_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'api' => 'string',
        'description' => 'string',
        'link' => 'string',
        'category' => CategoryEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
