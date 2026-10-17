
@extends('layouts.app')

@section('title', 'Editar equipo')

@section('content')
<div class="panel">
    <h2>Editar equipo</h2>

    <p>Modifica la información de {{ $equipo->nombre }}.</p>

    @if ($errors->any())
        <div class="error">
            <strong>Por favor, corrige los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.update', $equipo) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del equipo *</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $equipo->nombre) }}"
            maxlength="100"
            required
        >

        <label for="ciudad">Ciudad *</label>
        <input
            type="text"
            id="ciudad"
            name="ciudad"
            value="{{ old('ciudad', $equipo->ciudad) }}"
            maxlength="100"
            required
        >

        <label for="entrenador">Nombre del entrenador</label>
        <input
            type="text"
            id="entrenador"
            name="entrenador"
            value="{{ old('entrenador', $equipo->entrenador) }}"
            maxlength="100"
        >

        <label for="descripcion">Descripción</label>
        <textarea
            id="descripcion"
            name="descripcion"
            rows="4"
            maxlength="1000"
        >{{ old('descripcion', $equipo->descripcion) }}</textarea>

        <button type="submit" class="btn">
            Actualizar equipo
        </button>

        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
</div>
@endsection
