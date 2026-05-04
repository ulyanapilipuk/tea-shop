<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Регистрация - Чайная лавка</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --accent-gold: #d4af37;
            --text-light: #ffffff;
            --glass-bg: rgba(30, 30, 30, 0.7);
        }
        body {
            position: relative;
            background: url('/images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
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
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(4px);
            border-radius: 32px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.2);
            max-width: 480px;
            width: 90%;
            margin: 20px;
        }
        .btn-tea {
            background-color: var(--accent-gold);
            border: none;
            color: #1e2a1f;
            font-weight: bold;
            padding: 8px 24px;
            border-radius: 30px;
            transition: 0.2s;
        }
        .btn-tea:hover {
            background-color: #c6a43b;
            transform: scale(1.02);
        }
        a {
            color: var(--accent-gold);
            text-decoration: none;
        }
        a:hover {
            color: #ffd966;
            text-decoration: underline;
        }
        input, select, textarea {
            background: rgba(58, 74, 56, 0.8);
            border: 1px solid #5a6b58;
            color: #fff;
            border-radius: 8px;
            padding: 8px 12px;
            width: 100%;
        }
        input:focus {
            background: #4a5e48;
            outline: none;
            border-color: var(--accent-gold);
        }
        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }
        .form-check-input {
            width: auto;
            margin-right: 8px;
        }
        .text-danger {
            color: #ffa69e !important;
        }
        h2 {
            color: var(--accent-gold);
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h2 class="text-center mb-4">🍃 Регистрация</h2>

        @if ($errors->any())
            <div class="alert alert-danger bg-dark text-gold">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a href="{{ route('login') }}" class="small">Уже зарегистрированы?</a>
                <button type="submit" class="btn btn-tea">Зарегистрироваться</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>