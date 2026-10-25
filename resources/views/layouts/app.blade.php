
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Liga de Básquetbol') | Court League</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="theme-color" content="#101827">
    <meta name="description" content="Plataforma de gestión de equipos, jugadores, partidos y estadísticas de la Liga de Básquetbol.">

</head>

<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="{{ route('equipos.index') }}">
                <span class="brand-ball" aria-hidden="true">🏀</span>
                <span class="brand-copy">
                    <strong>COURT LEAGUE</strong>
                    <span>Liga de Básquetbol</span>
                </span>
            </a>

            <nav class="nav" aria-label="Navegación principal">
                @auth
                    <a class="nav-link" href="{{ route('equipos.index') }}">
                        Equipos
                    </a>

                    <a class="nav-link nav-link-highlight"
                       href="{{ route('equipos.create') }}">
                        + Registrar equipo
                    </a>

                    <a class="nav-link" href="{{ route('jugadores.index') }}">
                        Jugadores
                    </a>

                    <a class="nav-link" href="{{ route('partidos.index') }}">
                        Partidos
                    </a>

                    <a class="nav-link" href="{{ route('estadisticas.index') }}">
                        Estadísticas
                    </a>

                    <div class="user-area">
                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>

                        <form action="{{ route('logout') }}"
                              method="POST"
                              style="display: inline; margin: 0;">
                            @csrf

                            <button type="submit" class="btn btn-secondary">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                @else
                    <a class="nav-link" href="{{ route('login') }}">
                        Iniciar sesión
                    </a>

                    <a class="nav-link nav-link-highlight"
                       href="{{ route('register') }}">
                        Crear cuenta
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-inner">
            <div>
                <div class="hero-label">Pasión por el básquetbol</div>
                <h2>La liga se juega en equipo.</h2>
                <p>
                    Gestiona equipos, sigue los partidos y descubre
                    quién domina la clasificación.
                </p>
            </div>

            <div class="hero-tag">
                🏆 &nbsp; COMPETICIÓN · ESTADÍSTICAS · RESULTADOS
            </div>
        </div>
    </section>

    <main>
        @if (session('success'))
            <div class="success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert" role="alert">
                <strong>Revisa los siguientes datos:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <strong>COURT LEAGUE</strong>
        &nbsp;·&nbsp; Sistema de Gestión de Liga de Básquetbol
        &nbsp;·&nbsp; {{ date('Y') }}
    </footer>
</body>
</html>
