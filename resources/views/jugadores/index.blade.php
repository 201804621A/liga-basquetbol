
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de jugadores</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jugadores.create') }}" class="btn btn-primary">
        Registrar jugador
    </a>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>N.º</th>
                    <th>Jugador</th>
                    <th>DNI</th>
                    <th>Equipo</th>
                    <th>Camiseta</th>
                    <th>Posición</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($jugadores as $jugador)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jugador->nombres }} {{ $jugador->apellidos }}</td>
                        <td>{{ $jugador->dni }}</td>
                        <td>{{ $jugador->equipo->nombre }}</td>
                        <td>{{ $jugador->numero_camiseta }}</td>
                        <td>{{ $jugador->posicion }}</td>
                        <td>
                            <a href="{{ route('jugadores.edit', $jugador) }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('jugadores.destroy', $jugador) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este jugador?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Todavía no hay jugadores registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
