@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estadísticas de la Liga</h1>

    <p class="text-muted">
        Tabla de clasificación basada en los partidos finalizados.
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Jugados</th>
                    <th>Ganados</th>
                    <th>Perdidos</th>
                    <th>Puntos a favor</th>
                    <th>Puntos en contra</th>
                    <th>Diferencia</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($estadisticas as $indice => $fila)
                    <tr>
                        <td>{{ $indice + 1 }}</td>
                        <td>{{ $fila['equipo']->nombre }}</td>
                        <td>{{ $fila['jugados'] }}</td>
                        <td>{{ $fila['ganados'] }}</td>
                        <td>{{ $fila['perdidos'] }}</td>
                        <td>{{ $fila['puntos_favor'] }}</td>
                        <td>{{ $fila['puntos_contra'] }}</td>
                        <td>
                            @if ($fila['diferencia'] > 0)
                                +{{ $fila['diferencia'] }}
                            @else
                                {{ $fila['diferencia'] }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Todavía no hay equipos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('partidos.index') }}" class="btn btn-secondary">
        Volver a partidos
    </a>
</div>
@endsection
