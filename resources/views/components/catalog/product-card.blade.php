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
        
        {{-- IMAGEN REAL DEL PRODUCTO --}}
        <img 
            src="{{ $product->getImageUrl() }}" 
            alt="{{ $product->name }}"
            loading="lazy"
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;"
        >
    </div>
    <div class="card-body">
        <div class="card-brand">{{ $product->brand->name }}</div>
        <div class="card-name">{{ $product->name }}</div>
        <ul class="specs-list">
            @foreach($product->specs as $spec)
                <li>{{ $spec }}</li>
            @endforeach
        </ul>
    </div>
    <div class="card-footer">
        <div>
            <div class="price">{{ $product->formattedPrice() }}</div>
            @if($product->has_iva_included)
                <span class="price-iva">IVA incluido</span>
            @endif
        </div>
        <span class="cat-tag">{{ $product->category->name }}</span>
    </div>
</div>