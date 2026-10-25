<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Partido;

class EstadisticaController extends Controller
{
    public function index()
    {
        $equipos = Equipo::orderBy('nombre')->get();

        $partidos = Partido::where('estado', 'finalizado')
            ->whereNotNull('puntos_local')
            ->whereNotNull('puntos_visitante')
            ->get();

        $estadisticas = $equipos->map(function ($equipo) use ($partidos) {
            $jugados = 0;
            $ganados = 0;
            $perdidos = 0;
            $puntosFavor = 0;
            $puntosContra = 0;

            foreach ($partidos as $partido) {
                $esLocal = $partido->equipo_local_id == $equipo->id;
                $esVisitante = $partido->equipo_visitante_id == $equipo->id;

                if (!$esLocal && !$esVisitante) {
                    continue;
                }

                $jugados++;

                if ($esLocal) {
                    $favor = $partido->puntos_local;
                    $contra = $partido->puntos_visitante;
                } else {
                    $favor = $partido->puntos_visitante;
                    $contra = $partido->puntos_local;
                }

                $puntosFavor += $favor;
                $puntosContra += $contra;

                if ($favor > $contra) {
                    $ganados++;
                } elseif ($favor < $contra) {
                    $perdidos++;
                }
            }

            return [
                'equipo' => $equipo,
                'jugados' => $jugados,
                'ganados' => $ganados,
                'perdidos' => $perdidos,
                'puntos_favor' => $puntosFavor,
                'puntos_contra' => $puntosContra,
                'diferencia' => $puntosFavor - $puntosContra,
            ];
        });

        $estadisticas = $estadisticas
            ->sortByDesc('diferencia')
            ->sortByDesc('ganados')
            ->values();

        return view('estadisticas.index', compact('estadisticas'));
    }
}

