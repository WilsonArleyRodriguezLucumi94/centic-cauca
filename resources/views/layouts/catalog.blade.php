<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENTIC CAUCA — Catálogo de Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg: #0a0b0f;
            --surface: #12141a;
            --card: #181b24;
            --border: #252836;
            --accent: #00e5ff;
            --accent2: #ff3d71;
            --accent3: #a259ff;
            --text: #ffffff;
            --muted: #ffffff;
            --gaming: #ff3d71;
            --aio: #00e5ff;
            --laptop: #a259ff;
            --printer: #00d68f;
            --accs: #ffb800;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ─── HEADER ─── */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10,11,15,0.92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 68px;
        }

        .logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            background: linear-gradient(120deg, var(--accent), var(--accent3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo span { color: var(--accent2); -webkit-text-fill-color: var(--accent2); }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-box input {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            width: 240px;
            outline: none;
            transition: border-color 0.2s, width 0.3s;
        }

        .search-box input:focus { border-color: var(--accent); width: 300px; }
        .search-box input::placeholder { color: var(--muted); }

        .search-icon {
            position: absolute;
            left: 0.7rem;
            color: var(--muted);
            font-size: 0.875rem;
        }

        .count-badge {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            color: var(--muted);
        }
        .count-badge strong { color: var(--accent); font-weight: 600; }

        /* ─── HERO ─── */
        .hero {
            position: relative;
            text-align: center;
            padding: 5rem 2rem 4rem;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(0,229,255,0.12), transparent),
                        radial-gradient(ellipse 50% 40% at 85% 60%, rgba(162,89,255,0.08), transparent),
                        radial-gradient(ellipse 50% 40% at 15% 60%, rgba(255,61,113,0.08), transparent);
            pointer-events: none;
        }

        .hero-eyebrow {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--accent);
            background: rgba(0,229,255,0.08);
            border: 1px solid rgba(0,229,255,0.25);
            border-radius: 100px;
            padding: 0.35rem 1rem;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s ease both;
        }

        .hero h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.03em;
            animation: fadeUp 0.6s 0.1s ease both;
            margin-bottom: 1rem;
        }

        .hero h1 em {
            font-style: normal;
            background: linear-gradient(135deg, var(--accent), var(--accent3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: var(--muted);
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto 1rem;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        /* ─── FILTERS ─── */
        .filters-wrap {
            padding: 0 2rem 2rem;
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn:hover { border-color: var(--accent); color: var(--text); }

        .filter-btn.active {
            background: var(--accent);
            border-color: var(--accent);
            color: #000;
            font-weight: 600;
        }

        .filter-btn[data-cat="gaming"].active { background: var(--gaming); border-color: var(--gaming); }
        .filter-btn[data-cat="aio"].active { background: var(--aio); border-color: var(--aio); }
        .filter-btn[data-cat="portatil"].active { background: var(--laptop); border-color: var(--laptop); }
        .filter-btn[data-cat="impresora"].active { background: var(--printer); border-color: var(--printer); }
        .filter-btn[data-cat="accesorio"].active { background: var(--accs); border-color: var(--accs); }

        .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
        .dot-gaming { background: var(--gaming); }
        .dot-aio { background: var(--aio); }
        .dot-portatil { background: var(--laptop); }
        .dot-impresora { background: var(--printer); }
        .dot-accesorio { background: var(--accs); }
        .dot-all { background: linear-gradient(135deg, var(--accent), var(--accent3)); }

        /* ─── SORT ─── */
        .sort-bar {
            padding: 0 2rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
        }

        .sort-label { font-size: 0.875rem; color: var(--muted); }
        .sort-label strong { color: var(--text); }

        .sort-select {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
            cursor: pointer;
            outline: none;
        }

        /* ─── GRID ─── */
        .grid-wrap {
            padding: 0 2rem 4rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        /* ─── CARD ─── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s, border-color 0.25s, box-shadow 0.25s;
            animation: cardIn 0.4s ease both;
            position: relative;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(255,255,255,0.12);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .card-stripe {
            height: 3px;
            width: 100%;
        }

        .cat-gaming .card-stripe { background: linear-gradient(90deg, var(--gaming), #ff8a65); }
        .cat-aio .card-stripe { background: linear-gradient(90deg, var(--aio), #0090ff); }
        .cat-portatil .card-stripe { background: linear-gradient(90deg, var(--laptop), #e040fb); }
        .cat-impresora .card-stripe { background: linear-gradient(90deg, var(--printer), #00bcd4); }
        .cat-accesorio .card-stripe { background: linear-gradient(90deg, var(--accs), #ff6f00); }

        .card-img {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .card-img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(255,255,255,0.03), transparent 70%);
        }

        .badge-new {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--accent2);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
        }

        .badge-promo {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--accs);
            color: #000;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
        }

        .card-body { padding: 1.1rem 1.1rem 0.75rem; flex: 1; }

        .card-brand {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.3rem;
        }

        .card-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            line-height: 1.3;
            margin-bottom: 0.7rem;
            color: var(--text);
        }

        .specs-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .specs-list li {
            font-size: 0.78rem;
            color: var(--muted);
            display: flex;
            align-items: flex-start;
            gap: 0.4rem;
        }

        .specs-list li::before {
            content: '›';
            color: var(--accent);
            font-size: 0.9rem;
            line-height: 1;
            flex-shrink: 0;
        }

        .cat-gaming .specs-list li::before { color: var(--gaming); }
        .cat-portatil .specs-list li::before { color: var(--laptop); }
        .cat-impresora .specs-list li::before { color: var(--printer); }
        .cat-accesorio .specs-list li::before { color: var(--accs); }

        .card-footer {
            padding: 0.75rem 1.1rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border);
            margin-top: 0.75rem;
        }

        .price {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--text);
        }

        .price-iva {
            font-size: 0.65rem;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            display: block;
            margin-top: -2px;
        }

        .cat-tag {
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.2rem 0.55rem;
            border-radius: 5px;
        }

        .cat-gaming .cat-tag { background: rgba(255,61,113,0.12); color: var(--gaming); }
        .cat-aio .cat-tag { background: rgba(0,229,255,0.1); color: var(--aio); }
        .cat-portatil .cat-tag { background: rgba(162,89,255,0.12); color: var(--laptop); }
        .cat-impresora .cat-tag { background: rgba(0,214,143,0.1); color: var(--printer); }
        .cat-accesorio .cat-tag { background: rgba(255,184,0,0.1); color: var(--accs); }

        /* ─── EMPTY ─── */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--muted);
            display: none;
        }
        .empty-state.show { display: block; }
        .empty-state .empty-icon { font-size: 4rem; margin-bottom: 1rem; }
        .empty-state h3 { font-family: 'Syne', sans-serif; font-size: 1.25rem; color: var(--text); margin-bottom: 0.5rem; }

        /* ─── PROMO BANNER ─── */
        .promo-banner {
            margin: 0 2rem 2rem;
            background: linear-gradient(135deg, rgba(255,184,0,0.08), rgba(255,61,113,0.06));
            border: 1px solid rgba(255,184,0,0.2);
            border-radius: 14px;
            padding: 1rem 1.5rem;
            max-width: 1356px;
            margin-left: auto;
            margin-right: auto;
        }

        .promo-banner h3 {
            font-family: 'Syne', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--accs);
            margin-bottom: 0.4rem;
        }

        .promo-banner p { font-size: 0.82rem; color: var(--muted); line-height: 1.5; }
        .promo-banner p strong { color: var(--text); }

        /* ─── FOOTER ─── */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem;
            text-align: center;
            color: var(--muted);
            font-size: 0.8rem;
        }

        footer strong { color: var(--text); }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 640px) {
            header { padding: 0 1rem; }
            .search-box input { width: 160px; }
            .search-box input:focus { width: 180px; }
            .hero { padding: 3rem 1rem 2.5rem; }
            .grid-wrap { padding: 0 1rem 3rem; }
            .products-grid { grid-template-columns: 1fr; }
            .sort-bar { padding: 0 1rem 1rem; }
            .filters-wrap { padding: 0 1rem 1.5rem; }
        }

        /* ─── CARD IMAGE WITH REAL PHOTOS ─── */
        .card-img {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .card-img img {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img img {
            transform: scale(1.05);
        }

        /* Fallback si la imagen no carga */
        .card-img img::before {
            content: attr(alt);
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface);
            color: var(--muted);
            font-size: 0.8rem;
            text-align: center;
            padding: 1rem;
        }

        /* Dentro del <style> de tu layout catalog.blade.php */

        .card-img {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .card-img img {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img img {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    @include('catalog.partials.header')

    <main>
        @yield('content')
    </main>

    @include('catalog.partials.footer')

    <script>
        let currentFilter = 'all';

        function setFilter(cat, btn) {
            currentFilter = cat;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const banner = document.getElementById('promoBanner');
            if (banner) {
                banner.style.display = (cat === 'all' || cat === 'impresora') ? '' : 'none';
            }
            
            applyFilters();
        }

        function applyFilters() {
            const query = document.getElementById('searchInput').value.toLowerCase().trim();
            const sort = document.querySelector('.sort-select').value;
            
            const url = new URL(window.location.href);
            url.searchParams.set('category', currentFilter);
            url.searchParams.set('search', query);
            url.searchParams.set('sort', sort);
            window.location.href = url.toString();
        }

        function fmt(n) {
            return '$' + n.toLocaleString('es-CO');
        }
    </script>

</body>
</html>