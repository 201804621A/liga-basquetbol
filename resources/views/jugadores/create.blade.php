
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar jugador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Corrige los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jugadores.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input
                type="text"
                name="nombres"
                id="nombres"
                class="form-control"
                value="{{ old('nombres') }}"
                maxlength="100"
                required
            >
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input
                type="text"
                name="apellidos"
                id="apellidos"
                class="form-control"
                value="{{ old('apellidos') }}"
                maxlength="100"
                required
            >
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input
                type="text"
                name="dni"
                id="dni"
                class="form-control"
                value="{{ old('dni') }}"
                minlength="8"
                maxlength="8"
                pattern="[0-9]{8}"
                inputmode="numeric"
                required
            >
        </div>

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select name="equipo_id" id="equipo_id" class="form-select" required>
                <option value="">Selecciona un equipo</option>

                @foreach ($equipos as $equipo)
                    <option
                        value="{{ $equipo->id }}"
                        @selected(old('equipo_id') == $equipo->id)
                    >
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>

            @if ($equipos->isEmpty())
                <p class="text-danger mt-2">
                    Primero debes registrar un equipo para poder asignar jugadores.
                </p>
            @endif
        </div>

        <div class="mb-3">
            <label for="numero_camiseta" class="form-label">
                Número de camiseta
            </label>
            <input
                type="number"
                name="numero_camiseta"
                id="numero_camiseta"
                class="form-control"
                value="{{ old('numero_camiseta') }}"
                min="1"
                max="99"
                required
            >
        </div>

        <div class="mb-3">
            <label for="posicion" class="form-label">Posición</label>
            <select name="posicion" id="posicion" class="form-select" required>
                <option value="">Selecciona una posición</option>

                @foreach (['Base', 'Escolta', 'Alero', 'Ala-pívot', 'Pívot'] as $posicion)
                    <option
                        value="{{ $posicion }}"
                        @selected(old('posicion') == $posicion)
                    >
                        {{ $posicion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">
                Fecha de nacimiento
            </label>
            <input
                type="date"
                name="fecha_nacimiento"
                id="fecha_nacimiento"
                class="form-control"
                value="{{ old('fecha_nacimiento') }}"
                max="{{ date('Y-m-d', strtotime('-1 day')) }}"
            >
        </div>

        <button
            type="submit"
            class="btn btn-primary"
            @disabled($equipos->isEmpty())
        >
            Guardar jugador
        </button>

        <a href="{{ route('jugadores.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
</div>
@endsection
