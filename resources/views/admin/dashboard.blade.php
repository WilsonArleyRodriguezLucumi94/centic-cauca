@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Total Productos</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--accent);">{{ \App\Models\Product::count() }}</div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Categorías</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--accent3);">{{ \App\Models\Category::count() }}</div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Nuevos</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--success);">{{ \App\Models\Product::where('is_new', true)->count() }}</div>
        </div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <div style="color: var(--muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem;">Con Promo</div>
            <div style="font-family: 'Syne'; font-size: 2rem; font-weight: 800; color: var(--warning);">{{ \App\Models\Product::where('has_promo', true)->count() }}</div>
        </div>
    </div>
@endsection