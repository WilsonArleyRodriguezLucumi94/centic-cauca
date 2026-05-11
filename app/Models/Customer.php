<?php
// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'observations',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('document_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    public function getDocumentTypeLabel(): string
    {
        return match($this->document_type) {
            'cedula' => 'Cédula',
            'nit' => 'NIT',
            default => $this->document_type,
        };
    }
}