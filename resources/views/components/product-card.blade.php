{{-- resources/views/components/catalog/product-card.blade.php --}}

@props(['product'])

<div class="card cat-{{ $product->category->slug }}">
    <div class="card-stripe"></div>
    <div class="card-img">
        @if($product->is_new)
            <span class="badge-new">Nuevo</span>
        @endif
        @if($product->has_promo)
            <span class="badge-promo">Promo</span>
        @endif
        
        {{-- IMAGEN DESDE GOOGLE DRIVE --}}
        <img 
            src="{{ $product->getImageUrl() }}" 
            alt="{{ $product->name }}"
            loading="lazy"
            onerror="this.src='https://placehold.co/400x300/12141a/666?text=Sin+Imagen'"
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;"
        >
    </div>
    {{-- ... resto del card ... --}}
</div>