
@extends('layouts.app')

@section('title', 'Iniciar sesión - Liga de Básquetbol')

@section('content')
<div class="panel" style="max-width: 500px; margin: 0 auto;">
    <h2>Iniciar sesión</h2>
    <p>Ingresa tus credenciales para acceder al sistema.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <label for="email">Correo electrónico</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="email"
        >

        <label for="password">Contraseña</label>
        <input
            type="password"
            id="password"
            name="password"
            required
            autocomplete="current-password"
        >

        <label style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <input
                type="checkbox"
                name="remember"
                value="1"
                style="width: auto; margin: 0;"
            >
            Recordarme
        </label>

        <button type="submit" class="btn">Ingresar</button>
    </form>

    <p style="margin-top: 20px;">
        ¿No tienes una cuenta?
        <a href="{{ route('register') }}">Regístrate aquí</a>
    </p>
</div>
@endsection
