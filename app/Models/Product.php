<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'category_id', 'brand_id', 'name', 'slug',
        'specs', 'price', 'icon', 'image_url', 'image_id',
        'is_new', 'has_iva_included', 'has_promo', 'is_active'
    ];

    protected $casts = [
        'specs' => 'array',
        'is_new' => 'boolean',
        'has_iva_included' => 'boolean',
        'has_promo' => 'boolean',
        'is_active' => 'boolean',  // ← Asegúrate de que esté casteado
    ];

    // ─── RELACIONES ───
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    // ─── SCOPES ───
    
    /**
     * Scope para productos activos
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Filtrar por categoría
     */
    public function scopeFilterByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }
        return $query;
    }

    /**
     * Buscar en nombre, sku y specs
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhereJsonContains('specs', $search);
            });
        }
        return $query;
    }

    /**
     * Ordenar resultados
     */
    public function scopeSortBy($query, $sort)
    {
        return match($sort) {
            'precio-asc' => $query->orderBy('price', 'asc'),
            'precio-desc' => $query->orderBy('price', 'desc'),
            'nombre' => $query->orderBy('name', 'asc'),
            default => $query->latest()
        };
    }

    // ─── MÉTODOS AUXILIARES ───

    public function formattedPrice(): string
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

    public function getImageUrl(): string
    {
        if ($this->image_id) {
            return "https://lh3.googleusercontent.com/d/{$this->image_id}";
        }

        if ($this->image_url) {
            return $this->image_url;
        }

        return match($this->category->slug) {
            'aio' => 'https://placehold.co/400x300/12141a/00e5ff?text=AIO',
            'portatil' => 'https://placehold.co/400x300/12141a/a259ff?text=Port%C3%A1til',
            'gaming' => 'https://placehold.co/400x300/12141a/ff3d71?text=Gaming',
            'impresora' => 'https://placehold.co/400x300/12141a/00d68f?text=Impresora',
            'accesorio' => 'https://placehold.co/400x300/12141a/ffb800?text=Accesorio',
            default => 'https://placehold.co/400x300/12141a/666?text=Producto',
        };
    }
}