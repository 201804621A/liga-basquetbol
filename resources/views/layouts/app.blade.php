
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Liga de Básquetbol')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #172554;
            color: white;
            padding: 22px;
        }

        header h1 {
            margin: 0;
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-secondary {
            background: #64748b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #eff6ff;
        }

        input, textarea {
            display: block;
            width: 100%;
            padding: 11px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        label {
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error {
            color: #b91c1c;
            margin-top: -10px;
            margin-bottom: 12px;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        @media (max-width: 650px) {
            table {
                font-size: 13px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>🏀 Liga de Básquetbol</h1>

        
<nav>
    @auth
        <a href="{{ route('equipos.index') }}">Equipos</a>
        <a href="{{ route('equipos.create') }}">Registrar equipo</a>
        <a href="{{ route('jugadores.index') }}">Jugadores</a>
        <a href="{{ route('partidos.index') }}">Partidos</a>

        <span style="margin-right: 15px;">
            Usuario: {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST"
              style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Cerrar sesión
            </button>
        </form>
    @else
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Crear cuenta</a>
    @endauth
</nav>

    </header>

    <main>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
