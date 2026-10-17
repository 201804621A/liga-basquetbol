<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->orderBy('fecha_hora', 'desc')
            ->get();

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::orderBy('nombre')->get();

        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'equipo_local_id' => [
                'required',
                'exists:equipos,id',
                'different:equipo_visitante_id',
            ],
            'equipo_visitante_id' => [
                'required',
                'exists:equipos,id',
            ],
            'fecha_hora' => ['required', 'date'],
            'lugar' => ['required', 'string', 'max:255'],
            'estado' => [
                'required',
                Rule::in(['programado', 'en_juego', 'finalizado']),
            ],
            'puntos_local' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'puntos_visitante' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        if ($datos['estado'] === 'finalizado') {
            $request->validate([
                'puntos_local' => ['required', 'integer', 'min:0', 'max:65535'],
                'puntos_visitante' => ['required', 'integer', 'min:0', 'max:65535'],
            ]);
        }

        Partido::create($datos);

        return redirect()
            ->route('partidos.index')
            ->with('success', 'Partido registrado correctamente.');
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::orderBy('nombre')->get();

        return view('partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $datos = $request->validate([
            'equipo_local_id' => [
                'required',
                'exists:equipos,id',
                'different:equipo_visitante_id',
            ],
            'equipo_visitante_id' => [
                'required',
                'exists:equipos,id',
            ],
            'fecha_hora' => ['required', 'date'],
            'lugar' => ['required', 'string', 'max:255'],
            'estado' => [
                'required',
                Rule::in(['programado', 'en_juego', 'finalizado']),
            ],
            'puntos_local' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'puntos_visitante' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        if ($datos['estado'] === 'finalizado') {
            $request->validate([
                'puntos_local' => ['required', 'integer', 'min:0', 'max:65535'],
                'puntos_visitante' => ['required', 'integer', 'min:0', 'max:65535'],
            ]);
        }

        $partido->update($datos);

        return redirect()
            ->route('partidos.index')
            ->with('success', 'Partido actualizado correctamente.');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();

        return redirect()
            ->route('partidos.index')
            ->with('success', 'Partido eliminado correctamente.');
    }
}
