
@extends('layouts.app')

@section('title', 'Registrar equipo')

@section('content')
<div class="panel">
    <h2>Registrar nuevo equipo</h2>

    <p>Completa los datos del equipo de básquetbol.</p>

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

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del equipo *</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre') }}"
            maxlength="100"
            required
            placeholder="Ej. Leones del Cusco"
        >

        <label for="ciudad">Ciudad *</label>
        <input
            type="text"
            id="ciudad"
            name="ciudad"
            value="{{ old('ciudad') }}"
            maxlength="100"
            required
            placeholder="Ej. Cusco"
        >

        <label for="entrenador">Nombre del entrenador</label>
        <input
            type="text"
            id="entrenador"
            name="entrenador"
            value="{{ old('entrenador') }}"
            maxlength="100"
            placeholder="Ej. Juan Pérez"
        >

        <label for="descripcion">Descripción</label>
        <textarea
            id="descripcion"
            name="descripcion"
            rows="4"
            maxlength="1000"
            placeholder="Información adicional del equipo..."
        >{{ old('descripcion') }}</textarea>

        <button type="submit" class="btn">
            Guardar equipo
        </button>

        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
</div>
@endsection
