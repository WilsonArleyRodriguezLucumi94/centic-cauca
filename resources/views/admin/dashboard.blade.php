{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Productos</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--accent);">{{ \App\Models\Product::count() }}</div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Clientes</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--accent3);">{{ \App\Models\Customer::count() }}</div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Cotizaciones Pendientes</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--warning);">
                {{ \App\Models\Quotation::where('status', 'pendiente')->count() }}
            </div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Cotizaciones del Mes</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--success);">
                {{ \App\Models\Quotation::whereMonth('created_at', now()->month)->count() }}
            </div>
        </div>
    </div>

    {{-- Cotizaciones recientes --}}
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
        <h3 style="font-family: 'Syne'; font-size: 1.1rem; margin-bottom: 1rem;">Cotizaciones Recientes</h3>
        <table style="width: 100%;">
            <thead>
                <tr style="border-bottom: 1px solid var(--border);">
                    <th style="padding: 0.8rem; text-align: left; font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">Número</th>
                    <th style="padding: 0.8rem; text-align: left; font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">Cliente</th>
                    <th style="padding: 0.8rem; text-align: right; font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">Total</th>
                    <th style="padding: 0.8rem; text-align: center; font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Quotation::latest()->take(5)->get() as $quotation)
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.03);">
                    <td style="padding: 0.8rem; font-weight: 600;">{{ $quotation->quotation_number }}</td>
                    <td style="padding: 0.8rem;">{{ $quotation->customer->name }}</td>
                    <td style="padding: 0.8rem; text-align: right; font-family: 'Syne';">${{ number_format($quotation->total, 0, ',', '.') }}</td>
                    <td style="padding: 0.8rem; text-align: center;">
                        <span class="badge" style="background: {{ $quotation->getStatusColor() }}22; color: {{ $quotation->getStatusColor() }};">
                            {{ $quotation->getStatusLabel() }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection