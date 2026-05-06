@extends('layouts.admin')

@section('title', isset($product) ? 'Editar Producto' : 'Nuevo Producto')

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ isset($product) ? 'Editar' : 'Nuevo' }} Producto</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">← Volver</a>
    </div>

    <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem;">
        @csrf
        @if(isset($product)) @method('PUT') @endif

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">SKU</label>
                <input type="text" name="sku" class="form-input" value="{{ old('sku', $product->sku ?? '') }}" required>
                @error('sku')<span style="color: var(--accent2); font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $product->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Categoría</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $product->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Marca</label>
                <select name="brand_id" class="form-select" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ (old('brand_id', $product->brand_id ?? '') == $brand->id) ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Precio</label>
                <input type="number" name="price" class="form-input" value="{{ old('price', $product->price ?? '') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">ID Imagen Google Drive</label>
                <input type="text" name="image_id" class="form-input" value="{{ old('image_id', $product->image_id ?? '') }}" placeholder="1ABC123...">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Especificaciones (una por línea)</label>
            <textarea name="specs[]" class="form-textarea" rows="4" placeholder="Intel Core i5...&#10;8GB RAM...&#10;SSD 512GB...">{{ old('specs', isset($product) ? implode("\n", $product->specs) : '') }}</textarea>
        </div>

        <div style="display: flex; gap: 1.5rem; margin-bottom: 1.5rem;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_new" value="1" {{ old('is_new', $product->is_new ?? false) ? 'checked' : '' }}>
                <span style="color: var(--text); font-size: 0.875rem;">Nuevo</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="has_iva_included" value="1" {{ old('has_iva_included', $product->has_iva_included ?? false) ? 'checked' : '' }}>
                <span style="color: var(--text); font-size: 0.875rem;">IVA Incluido</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="has_promo" value="1" {{ old('has_promo', $product->has_promo ?? false) ? 'checked' : '' }}>
                <span style="color: var(--text); font-size: 0.875rem;">Promoción</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                <span style="color: var(--text); font-size: 0.875rem;">Activo</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($product) ? 'Actualizar Producto' : 'Crear Producto' }}
        </button>
    </form>
@endsection