
@extends('layouts.app')

@section('title', 'Crear cuenta - Liga de Básquetbol')

@section('content')
<div class="panel" style="max-width: 500px; margin: 0 auto;">
    <h2>Crear una cuenta</h2>
    <p>Regístrate para gestionar la Liga de Básquetbol.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Nombre completo</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
            maxlength="255"
            autocomplete="name"
        >

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
            minlength="8"
            autocomplete="new-password"
        >

        <label for="password_confirmation">Confirmar contraseña</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            minlength="8"
            autocomplete="new-password"
        >

        <button type="submit" class="btn">Crear cuenta</button>
    </form>

    <p style="margin-top: 20px;">
        ¿Ya tienes una cuenta?
        <a href="{{ route('login') }}">Inicia sesión aquí</a>
    </p>
</div>
@endsection
