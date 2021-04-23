<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static findOrFail($id)
 * @property mixed id
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'publisher_name',
        'writer_name',
        'stock',
        'price',
        'category_id',
        'image',
        'description'
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
