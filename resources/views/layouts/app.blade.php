<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'GridWork') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            font-family: 'Rajdhani', sans-serif;
            background: #0a0a0a;
            color: #e0ffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            min-height: 100%;
            background: #0a0a0a;
            color: #e0ffff;
        }

        body {
            line-height: 1.5;
        }

        a {
            color: #00fff5;
            text-decoration: none;
        }

        .page-shell {
            max-width: 1200px;
            margin: 0 auto;
            padding: 28px;
        }

        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 24px;
            padding: 18px 26px;
            border: 1px solid rgba(0, 255, 245, .18);
            background: rgba(10, 10, 10, .95);
            box-shadow: 0 0 20px rgba(0, 255, 245, .12);
            border-radius: 18px;
        }

        .brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.55rem;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #00fff5;
            text-shadow: 0 0 20px rgba(0, 255, 245, .5);
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
        }

        .nav-links a {
            position: relative;
            padding: 10px 0;
            font-size: .95rem;
            color: #c8ffff;
        }

        .nav-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #00fff5;
            transition: width .25s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .card {
            background: #111111;
            border: 1px solid #00fff5;
            border-radius: 20px;
            box-shadow: 0 0 14px rgba(0, 255, 245, .16);
            padding: 26px;
            margin-bottom: 24px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 22px;
            border: 1px solid #00fff5;
            background: #000000;
            color: #00fff5;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: .08em;
            box-shadow: 0 0 18px rgba(0, 255, 245, .25);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 0 24px rgba(0, 255, 245, .45);
        }

        input, textarea, select {
            width: 100%;
            background: #111111;
            border: 1px solid rgba(0, 255, 245, .45);
            color: #eaffff;
            padding: 14px 16px;
            border-radius: 14px;
            box-shadow: inset 0 0 10px rgba(0, 255, 245, .08);
            font: inherit;
            outline: none;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #00fff5;
            box-shadow: 0 0 16px rgba(0, 255, 245, .35);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            margin-bottom: 10px;
            font-size: .95rem;
            color: #c8ffff;
        }

        .field small {
            display: block;
            margin-top: 6px;
            color: rgba(255, 255, 255, .65);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        .table th, .table td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 255, 245, .12);
            color: #e4ffff;
        }

        .table th {
            color: #00fff5;
            font-family: 'Orbitron', sans-serif;
            font-size: .95rem;
        }

        .table tbody tr:hover {
            background: rgba(0, 255, 245, .05);
        }

        .flash-success {
            padding: 16px 18px;
            border: 1px solid #00fff5;
            background: rgba(0, 255, 245, .08);
            color: #bdf5ff;
            margin-bottom: 20px;
            border-radius: 14px;
            box-shadow: 0 0 16px rgba(0, 255, 245, .14);
        }

        .error-list {
            padding: 16px 18px;
            border: 1px solid #ff2fa5;
            background: rgba(255, 47, 165, .12);
            color: #ff91d0;
            margin-bottom: 20px;
            border-radius: 14px;
            font-size: .95rem;
        }

        .error {
            display: block;
            margin-top: 8px;
            color: #ff2fa5;
            font-size: .92rem;
        }

        .hero {
            display: grid;
            gap: 24px;
            padding: 60px 36px;
            min-height: calc(100vh - 145px);
            border-radius: 28px;
            background: radial-gradient(circle at top left, rgba(0, 255, 245, .18), transparent 35%),
                        linear-gradient(180deg, rgba(255, 255, 255, .02), rgba(0, 0, 0, .92));
            border: 1px solid rgba(0, 255, 245, .22);
            box-shadow: 0 0 40px rgba(0, 255, 245, .22);
        }

        .hero h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 3.5rem;
            line-height: 1.02;
            text-transform: uppercase;
            color: #00fff5;
            text-shadow: 0 0 30px rgba(0, 255, 245, .45);
        }

        .hero p {
            max-width: 720px;
            font-size: 1.15rem;
            color: #c8ffff;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.7rem;
            margin-bottom: 14px;
            color: #00fff5;
        }

        .details-grid {
            display: grid;
            gap: 20px;
        }

        .details-item {
            background: #111111;
            border: 1px solid rgba(0, 255, 245, .14);
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 0 12px rgba(0, 255, 245, .08);
        }

        .badge {
            display: inline-flex;
            padding: .45rem .9rem;
            border: 1px solid #00fff5;
            border-radius: 999px;
            color: #00fff5;
            font-size: .85rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            background: rgba(0, 255, 245, .06);
        }

        @media (max-width: 900px) {
            .app-header { flex-direction: column; align-items: flex-start; }
            .nav-links a { margin-left: 0; margin-top: 10px; display: inline-block; }
            .hero { padding: 40px 24px; }
            .hero h1 { font-size: 2.6rem; }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <header class="app-header">
            <div class="brand">GridWork</div>
            <nav class="nav-links">
                <a href="{{ route('services.index') }}">Services</a>
                <a href="{{ route('prestataires.index') }}">Prestataires</a>
                <a href="{{ route('reservations.index') }}">Réservations</a>
            </nav>
        </header>

        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error-list">
                <strong>Validation failed:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
