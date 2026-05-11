<?php
// app/Models/Quotation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_number',
        'customer_id',
        'user_id',
        'issue_date',
        'expiration_date',
        'subtotal',
        'tax',
        'total',
        'status',
        'observations',
        'is_active',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiration_date' => 'date',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pendiente');
    }

    public function scopeExpired($query)
    {
        return $query->where('expiration_date', '<', now()->toDateString())
                     ->where('status', 'pendiente');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function($q) use ($search) {
                $q->where('quotation_number', 'like', "%{$search}%")
                  ->orWhereHas('customer', function($cq) use ($search) {
                      $cq->where('name', 'like', "%{$search}%")
                         ->orWhere('document_number', 'like', "%{$search}%");
                  });
            });
        }
        return $query;
    }

    /**
     * Verifica si la cotización está vencida
     */
    public function isExpired(): bool
    {
        return $this->expiration_date < now()->toDateString() && $this->status === 'pendiente';
    }

    /**
     * Días restantes de validez
     */
    public function daysRemaining(): int
    {
        if ($this->status !== 'pendiente') return 0;
        return max(0, now()->diffInDays($this->expiration_date, false));
    }

    /**
     * Actualiza estado a vencido si aplica
     */
    public function checkExpiration(): void
    {
        if ($this->isExpired()) {
            $this->update(['status' => 'vencida']);
        }
    }

    public function getStatusColor(): string
    {
        return match($this->status) {
            'pendiente' => '#ffb703',
            'aprobada' => '#06ffa5',
            'rechazada' => '#ff006e',
            'vencida' => '#5a6a8a',
            default => '#5a6a8a',
        };
    }

    public function getStatusLabel(): string
    {
        return match($this->status) {
            'pendiente' => 'Pendiente',
            'aprobada' => 'Aprobada',
            'rechazada' => 'Rechazada',
            'vencida' => 'Vencida',
            default => $this->status,
        };
    }
}