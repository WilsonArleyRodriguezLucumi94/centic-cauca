@props(['count', 'currentSort'])

<div class="sort-bar">
    <span class="sort-label">Mostrando <strong>{{ $count }}</strong> productos</span>
    <select class="sort-select" onchange="applyFilters()">
        <option value="default" {{ $currentSort === 'default' ? 'selected' : '' }}>Sin ordenar</option>
        <option value="precio-asc" {{ $currentSort === 'precio-asc' ? 'selected' : '' }}>Precio: menor a mayor</option>
        <option value="precio-desc" {{ $currentSort === 'precio-desc' ? 'selected' : '' }}>Precio: mayor a menor</option>
        <option value="nombre" {{ $currentSort === 'nombre' ? 'selected' : '' }}>Nombre A-Z</option>
    </select>
</div>