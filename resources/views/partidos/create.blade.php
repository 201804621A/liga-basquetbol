
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar partido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partidos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="equipo_local_id">Equipo local</label>
            <select name="equipo_local_id" id="equipo_local_id" class="form-control" required>
                <option value="">Selecciona el equipo local</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}"
                        {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="equipo_visitante_id">Equipo visitante</label>
            <select name="equipo_visitante_id" id="equipo_visitante_id" class="form-control" required>
                <option value="">Selecciona el equipo visitante</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}"
                        {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_hora">Fecha y hora</label>
            <input type="datetime-local"
                   name="fecha_hora"
                   id="fecha_hora"
                   class="form-control"
                   value="{{ old('fecha_hora') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="lugar">Lugar del partido</label>
            <input type="text"
                   name="lugar"
                   id="lugar"
                   class="form-control"
                   value="{{ old('lugar') }}"
                   maxlength="255"
                   required>
        </div>

        <div class="mb-3">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="programado" {{ old('estado', 'programado') == 'programado' ? 'selected' : '' }}>
                    Programado
                </option>
                <option value="en_juego" {{ old('estado') == 'en_juego' ? 'selected' : '' }}>
                    En juego
                </option>
                <option value="finalizado" {{ old('estado') == 'finalizado' ? 'selected' : '' }}>
                    Finalizado
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="puntos_local">Puntos del equipo local</label>
            <input type="number"
                   name="puntos_local"
                   id="puntos_local"
                   class="form-control"
                   min="0"
                   max="65535"
                   value="{{ old('puntos_local') }}">
        </div>

        <div class="mb-3">
            <label for="puntos_visitante">Puntos del equipo visitante</label>
            <input type="number"
                   name="puntos_visitante"
                   id="puntos_visitante"
                   class="form-control"
                   min="0"
                   max="65535"
                   value="{{ old('puntos_visitante') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar partido</button>
        <a href="{{ route('partidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
