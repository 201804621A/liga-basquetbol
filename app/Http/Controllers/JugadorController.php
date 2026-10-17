<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')
            ->orderBy('apellidos')
            ->get();

        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::orderBy('nombre')->get();

        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'equipo_id' => ['required', 'exists:equipos,id'],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'dni' => ['required', 'string', 'digits:8', 'unique:jugadores,dni'],
            'numero_camiseta' => ['required', 'integer', 'between:1,99'],
            'posicion' => [
                'required',
                Rule::in(['Base', 'Escolta', 'Alero', 'Ala-pívot', 'Pívot']),
            ],
            'fecha_nacimiento' => ['nullable', 'date', 'before:today'],
        ]);

        Jugador::create($datos);

        return redirect()
            ->route('jugadores.index')
            ->with('success', 'Jugador registrado correctamente.');
    }

    public function edit(Jugador $jugadore)
    {
        $equipos = Equipo::orderBy('nombre')->get();

        return view('jugadores.edit', [
            'jugador' => $jugadore,
            'equipos' => $equipos,
        ]);
    }

    public function update(Request $request, Jugador $jugadore)
    {
        $datos = $request->validate([
            'equipo_id' => ['required', 'exists:equipos,id'],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'dni' => [
                'required',
                'string',
                'digits:8',
                Rule::unique('jugadores', 'dni')->ignore($jugadore->id),
            ],
            'numero_camiseta' => ['required', 'integer', 'between:1,99'],
            'posicion' => [
                'required',
                Rule::in(['Base', 'Escolta', 'Alero', 'Ala-pívot', 'Pívot']),
            ],
            'fecha_nacimiento' => ['nullable', 'date', 'before:today'],
        ]);

        $jugadore->update($datos);

        return redirect()
            ->route('jugadores.index')
            ->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy(Jugador $jugadore)
    {
        $jugadore->delete();

        return redirect()
            ->route('jugadores.index')
            ->with('success', 'Jugador eliminado correctamente.');
    }
}
