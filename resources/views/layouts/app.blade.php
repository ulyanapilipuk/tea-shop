<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Чайная лавка</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #1e2a1f;
            --card-bg: #2c3a2b;
            --accent-gold: #d4af37;
            --tea-brown: #8b5a2b;
            --text-light: #f0ede8;
            --border-rustic: 12px;
        }
        body {
            background: var(--bg-dark);
            background-image: radial-gradient(circle at 10% 20%, rgba(139,90,43,0.1) 2%, transparent 2.5%);
            background-size: 30px 30px;
            font-family: 'Roboto', sans-serif;
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        h1, h2, h3, h4, .brand {
            font-family: 'Playfair Display', serif;
            letter-spacing: 2px;
        }
        .navbar-custom {
            background: #1a2a1b;
            border-bottom: 2px solid var(--accent-gold);
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        .navbar-custom .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--accent-gold) !important;
        }
        .navbar-custom .nav-link {
            color: #ddd !important;
            font-weight: 500;
            margin: 0 5px;
        }
        .navbar-custom .nav-link:hover {
            color: var(--accent-gold) !important;
        }
        .card-tea {
            background: var(--card-bg);
            border: 1px solid rgba(212,175,55,0.3);
            border-radius: var(--border-rustic);
            transition: transform 0.3s, box-shadow 0.3s;
            color: var(--text-light);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        .card-tea:hover {
            transform: translateY(-8px);
            border-color: var(--accent-gold);
            box-shadow: 0 12px 25px rgba(0,0,0,0.5);
        }
        .card-tea .card-title {
            color: var(--accent-gold);
            font-weight: bold;
        }
        .card-tea .btn-tea {
            background-color: var(--accent-gold);
            border: none;
            color: #1e2a1f;
            font-weight: bold;
        }
        .btn-tea {
            background-color: var(--accent-gold);
            border: none;
            color: #1e2a1f;
            font-weight: bold;
            padding: 6px 16px;
            border-radius: 30px;
        }
        .btn-tea-outline {
            background: transparent;
            border: 1px solid var(--accent-gold);
            color: var(--accent-gold);
        }
        .btn-tea-outline:hover {
            background: var(--accent-gold);
            color: #1e2a1f;
        }
        .hero {
            background: linear-gradient(135deg, #1e2a1f 0%, #2c3a2b 100%);
            padding: 3rem 0;
            border-radius: 0 0 40px 40px;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--accent-gold);
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .footer {
            background: #0f1a10;
            color: #aaa;
            text-align: center;
            padding: 1rem;
            margin-top: 3rem;
            border-top: 1px solid var(--accent-gold);
            font-size: 0.9rem;
        }
        .table-custom {
            background: #2c3a2b;
            color: #eee;
            border-radius: 12px;
            overflow: hidden;
        }
        .table-custom th {
            background: #1e2a1f;
            color: var(--accent-gold);
            border-bottom: 2px solid var(--accent-gold);
        }
        .alert {
            background-color: #2c3a2b;
            color: var(--accent-gold);
            border-left: 5px solid var(--accent-gold);
        }
        a {
            color: var(--accent-gold);
        }
        a:hover {
            color: #ffd966;
        }
        input, textarea, select {
            background: #3a4a38;
            border: 1px solid #5a6b58;
            color: #fff;
        }
        input:focus, textarea:focus {
            background: #4a5e48;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                🍃 Чайная лавка · Вкус традиций © {{ date('Y') }}
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>