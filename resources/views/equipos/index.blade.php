
@extends('layouts.app')

@section('title', 'Lista de equipos')

@section('content')
<div class="panel">
    <h2>Equipos de básquetbol</h2>

    <p>Administra los equipos que participan en la liga.</p>

    <a href="{{ route('equipos.create') }}" class="btn">
        + Registrar equipo
    </a>

    @if ($equipos->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del equipo</th>
                    <th>Ciudad</th>
                    <th>Entrenador</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->id }}</td>
                        <td>{{ $equipo->nombre }}</td>
                        <td>{{ $equipo->ciudad }}</td>
                        <td>{{ $equipo->entrenador ?: 'No registrado' }}</td>

                        <td>
                            <div class="actions">
                                <a
                                    href="{{ route('equipos.edit', $equipo) }}"
                                    class="btn"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('equipos.destroy', $equipo) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este equipo?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            {{ $equipos->links() }}
        </div>
    @else
        <p style="margin-top: 25px;">
            Todavía no hay equipos registrados. Haz clic en
            <strong>Registrar equipo</strong> para comenzar.
        </p>
    @endif
</div>
@endsection
