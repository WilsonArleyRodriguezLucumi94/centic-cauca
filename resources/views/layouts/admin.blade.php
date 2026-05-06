{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — TechStore</title>
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
            --text: #e8eaf0;
            --muted: #6b7080;
            --success: #00d68f;
            --warning: #ffb800;
            --danger: #ff3d71;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
        }
        .admin-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10,11,15,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 68px;
        }
        .admin-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            background: linear-gradient(120deg, var(--accent), var(--accent3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .admin-nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        .admin-nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
            padding: 0.5rem 0;
        }
        .admin-nav a:hover, .admin-nav a.active {
            color: var(--accent);
        }
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-name {
            color: var(--text);
            font-size: 0.85rem;
        }
        .logout-btn {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 0.4rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .logout-btn:hover {
            border-color: var(--accent2);
            color: var(--accent2);
        }
        .admin-main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .page-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
        }
        .btn-primary {
            background: var(--accent);
            color: #000;
        }
        .btn-primary:hover {
            background: #33ebff;
            transform: translateY(-2px);
        }
        .btn-danger {
            background: rgba(255,61,113,0.15);
            color: var(--accent2);
            border: 1px solid rgba(255,61,113,0.3);
        }
        .btn-danger:hover {
            background: rgba(255,61,113,0.25);
        }
        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }
        .data-table th {
            background: var(--surface);
            color: var(--muted);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }
        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.875rem;
            color: var(--text);
        }
        .data-table tr:hover td {
            background: rgba(255,255,255,0.02);
        }
        .data-table tr:last-child td {
            border-bottom: none;
        }
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 5px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-success {
            background: rgba(0,214,143,0.15);
            color: var(--success);
        }
        .badge-danger {
            background: rgba(255,61,113,0.15);
            color: var(--accent2);
        }
        .alert {
            padding: 1rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        .alert-success {
            background: rgba(0,214,143,0.1);
            border: 1px solid rgba(0,214,143,0.3);
            color: var(--success);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            color: var(--muted);
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.7rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--accent);
        }
        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .admin-nav { display: none; }
        }
    </style>
</head>
<body>

    <header class="admin-header">
        <div class="admin-logo">TechStore Admin</div>
        <nav class="admin-nav">
            {{-- CORREGIDO: route('dashboard') en lugar de route('admin.dashboard') --}}
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Productos</a>
            <a href="{{ route('catalog.index') }}">Ver Catálogo</a>
        </nav>
        <div class="user-menu">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </div>
    </header>

    <main class="admin-main">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

</body>
</html>