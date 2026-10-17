
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Partidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('partidos.create') }}" class="btn btn-primary">
        Registrar partido
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Equipo local</th>
                <th>Equipo visitante</th>
                <th>Fecha y hora</th>
                <th>Lugar</th>
                <th>Marcador</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($partidos as $partido)
                <tr>
                    <td>{{ $partido->equipoLocal->nombre }}</td>
                    <td>{{ $partido->equipoVisitante->nombre }}</td>
                    <td>{{ $partido->fecha_hora->format('d/m/Y H:i') }}</td>
                    <td>{{ $partido->lugar }}</td>
                    <td>
                        @if ($partido->puntos_local !== null && $partido->puntos_visitante !== null)
                            {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                        @else
                            Pendiente
                        @endif
                    </td>
                    <td>{{ ucfirst(str_replace('_', ' ', $partido->estado)) }}</td>
                    <td>
                        <a href="{{ route('partidos.edit', $partido) }}" class="btn btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('partidos.destroy', $partido) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('¿Deseas eliminar este partido?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Todavía no hay partidos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
