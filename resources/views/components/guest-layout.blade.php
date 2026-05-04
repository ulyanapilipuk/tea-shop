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
            max-width: 500px;
            width: 100%;
            margin: 20px;
        }

        .btn-tea {
            background-color: var(--accent-gold);
            border: none;
            color: #1e2a1f;
            font-weight: bold;
            padding: 8px 20px;
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
        }
        .alert {
            background-color: rgba(30,30,30,0.9);
            color: var(--accent-gold);
            border-left: 5px solid var(--accent-gold);
        }
        .text-sm {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>