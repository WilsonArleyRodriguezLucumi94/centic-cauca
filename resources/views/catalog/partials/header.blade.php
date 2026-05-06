<!-- resources/views/catalog/partials/header.blade.php -->
<header>
    <div class="logo">Tech<span>Store</span></div>
    <div class="header-right">
        <div class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" id="searchInput" placeholder="Buscar productos..." oninput="applyFilters()">
        </div>
        <div class="count-badge" id="countBadge">
            <strong>{{ $products->count() ?? 0 }}</strong> productos
        </div>
        
        {{-- BOTÓN LOGIN / ADMIN --}}
        @auth
            <a href="{{ route('dashboard') }}" style="background: var(--surface); border: 1px solid var(--border); color: var(--accent); padding: 0.4rem 1rem; border-radius: 8px; font-size: 0.8rem; text-decoration: none; font-weight: 600;">
                Admin
            </a>
        @else
            <a href="{{ route('login') }}" style="background: var(--surface); border: 1px solid var(--border); color: var(--muted); padding: 0.4rem 1rem; border-radius: 8px; font-size: 0.8rem; text-decoration: none;">
                Ingresar
            </a>
        @endauth
    </div>
</header>