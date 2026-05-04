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
            --accent-gold: #d4af37;
            --text-light: #ffffff;
            --glass-bg: rgba(30, 30, 30, 0.7);
            --card-bg: rgba(44, 58, 43, 0.85);
            --footer-bg: rgba(15, 26, 16, 0.9);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            position: relative;
            background: url('/images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            color: var(--text-light);
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            z-index: -1;
        }

        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
            padding: 20px 0;
        }

        /* Стеклянный блок для основного контента */
        .glass-container {
            background: var(--glass-bg);
            backdrop-filter: blur(4px);
            border-radius: 32px;
            padding: 20px;
            margin: 20px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.2);
            overflow: visible !important; /* важно для выпадающего меню */
        }

        /* Карточки товаров */
        .card-tea {
            background: var(--card-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(212,175,55,0.3);
            border-radius: 24px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            transition: all 0.2s ease;
            color: var(--text-light);
        }

        .card-tea:hover {
            transform: translateY(-5px);
            border-color: var(--accent-gold);
            box-shadow: 0 20px 30px rgba(0,0,0,0.4);
        }

        .card-tea .card-title {
            color: var(--accent-gold);
            font-family: 'Playfair Display', serif;
            font-weight: bold;
        }

        .card-tea img {
            border-radius: 24px 24px 0 0;
            object-fit: cover;
            height: 180px;
        }

        /* КНОПКИ */
        .btn-tea {
            background-color: var(--accent-gold);
            border: none;
            color: #1e2a1f;
            font-weight: bold;
            padding: 6px 16px;
            border-radius: 30px;
            transition: 0.2s;
        }

        .btn-tea:hover {
            background-color: #c6a43b;
            color: #1e2a1f;
            transform: scale(1.02);
        }

        .btn-outline-tea {
            background: rgba(0, 0, 0, 0.6);
            border: 1px solid var(--accent-gold);
            color: var(--accent-gold);
            border-radius: 30px;
            padding: 5px 15px;
            transition: 0.2s;
        }

        .btn-outline-tea:hover {
            background: var(--accent-gold);
            color: #1e2a1f;
            border-color: var(--accent-gold);
        }

        /* Таблицы */
        .table-custom {
            background: rgba(44, 58, 43, 0.9);
            border-radius: 16px;
            overflow: hidden;
            color: #fff;
        }

        .table-custom th {
            background-color: #1e2a1f;
            color: var(--accent-gold);
            border-bottom: 2px solid var(--accent-gold);
        }

        .table-custom td, .table-custom th {
            padding: 12px;
            vertical-align: middle;
        }

        /* Формы */
        input, textarea, select {
            background: rgba(58, 74, 56, 0.8);
            border: 1px solid #5a6b58;
            color: #fff;
            border-radius: 8px;
            padding: 6px 12px;
        }

        input:focus, textarea:focus {
            background: #4a5e48;
            color: #fff;
            outline: none;
            border-color: var(--accent-gold);
        }

        /* Пагинация */
        .pagination .page-link {
            background: #2c3a2b;
            color: var(--accent-gold);
            border-color: #5a6b58;
        }
        .pagination .page-item.active .page-link {
            background: var(--accent-gold);
            color: #1e2a1f;
            border-color: var(--accent-gold);
        }

        /* Навигация (хедер) */
        .navbar-custom {
            background: rgba(30, 42, 31, 0.95);
            backdrop-filter: blur(4px);
            border-bottom: 2px solid var(--accent-gold);
            position: relative;
            z-index: 1050;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: var(--accent-gold) !important;
        }
        .navbar-custom .dropdown-menu {
            background-color: #1e2a1f;
            position: absolute;
            top: 100%;
            left: auto;
            right: 0;
            z-index: 1060 !important;
        }
        .navbar-custom .dropdown-item {
            color: white;
        }
        .navbar-custom .dropdown-item:hover {
            background-color: var(--accent-gold);
            color: #1e2a1f;
        }

        /* Футер */
        .footer {
            background: var(--footer-bg);
            backdrop-filter: blur(4px);
            text-align: center;
            padding: 1rem;
            border-top: 1px solid var(--accent-gold);
            font-size: 0.9rem;
        }

        .container {
            max-width: 1200px;
        }
        .py-4 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }
    </style>
</head>
<body>
<div id="app">
    @include('layouts.navigation')

    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="glass-container">
                @yield('content')
            </div>
        </div>
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