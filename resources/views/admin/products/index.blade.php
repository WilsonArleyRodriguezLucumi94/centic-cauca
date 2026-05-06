@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Gestión de Productos</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Nuevo Producto</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>SKU</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}" style="width: 60px; height: 45px; object-fit: cover; border-radius: 6px;">
                </td>
                <td><code style="background: var(--surface); padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.75rem;">{{ $product->sku }}</code></td>
                <td style="font-weight: 600;">{{ $product->name }}</td>
                <td>
                    <span style="color: {{ $product->category->color }};">{{ $product->category->name }}</span>
                </td>
                <td>{{ $product->brand->name }}</td>
                <td style="font-family: 'Syne'; font-weight: 700;">{{ $product->formattedPrice() }}</td>
                <td>
                    @if($product->is_active)
                        <span class="badge badge-success">Activo</span>
                    @else
                        <span class="badge badge-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">Editar</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 1.5rem;">
        {{ $products->links() }}
    </div>
@endsection