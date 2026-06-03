<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'keywords',
        'description',
        'detail',
        'image',
        'price',
        'stock',
        'min_stock',
        'discount',
        'status',
    ];

    /**

     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
