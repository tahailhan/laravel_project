<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'parent_id', 'title', 'keywords', 'description', 'image', 'status'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Eski getParentsTree metodunu istersen burada tutabilirsin (Ben şimdilik tuttum)
    public function getParentsTree()
    {
        if ($this->parent_id == 0) {
            return 'Main Category';
        }

        $parent = $this->parent;
        $tree = [];

        while ($parent) {
            array_unshift($tree, $parent->title);
            $parent = $parent->parent;
        }

        return implode(' -> ', $tree);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // 🔥 İŞTE EKSİK OLAN VE LİSTEYİ DOLDURACAK SİHİRLİ FONKSİYON:
    public function getFullPathAttribute()
    {
        $titles = [];
        $current = $this;

        while ($current) {
            // Mevcut kategorinin adını diziye ekle
            $titles[] = $current->title;

            // Eğer en üst kategoriye geldiysek döngüyü kır
            if (!$current->parent_id || $current->parent_id == 0) {
                break;
            }

            // Bir üst kategoriye geç
            $current = $current->parent;
        }

        // Diziyi ters çevirip aralara ok koyarak metne dönüştür
        return implode(' -> ', array_reverse($titles));
    }
}
