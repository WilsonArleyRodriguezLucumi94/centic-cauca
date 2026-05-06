@extends('layouts.catalog')

@section('content')
    <x-catalog.hero 
        eyebrow="📅 Catálogo — Abril 2026"
        title="Tu tecnología,<br><em>al mejor precio</em>"
        subtitle="Portátiles, All in One, Gaming, Impresoras y más. Precios IVA incluido."
    />

    <x-catalog.filters 
        :categories="$categories" 
        :activeCategory="request('category', 'all')"
    />

    <x-catalog.promo-banner />

    <x-catalog.sort-bar 
        :count="$products->count()" 
        :currentSort="request('sort', 'default')"
    />

    <div class="grid-wrap">
        <div class="products-grid" id="productsGrid">
            @forelse($products as $product)
                <x-catalog.product-card :product="$product" />
            @empty
                <x-catalog.empty-state />
            @endforelse
        </div>
    </div>
@endsection