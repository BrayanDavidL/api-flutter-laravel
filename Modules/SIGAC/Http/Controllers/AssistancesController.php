<?php

namespace Modules\SIGAC\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIGAC\Entities\Assistances;

class AssistancesController extends Controller
{
    public function asistencia(Request $request)
    {
        $attrs = $request->validate([
            'usuario_id' => 'required|string',
            'instructor_id'=>'required|string',
            'typeassistences' => 'required|boolean',
        ]);

        $asistencia = Assistances::create([
            'person_id' => $attrs['usuario_id'],
            'program_instructor_id' => $attrs['instructor_id'],
            'type_assitance_id' =>$attrs['typeassistences'],
        ]);

        return response(['message' => 'Asistencia guardada correctamente', 'data' => $asistencia], 201);
    }

    
    public function consultar(request $usuarioId)
    {
        $asistencias = Assistances::where('person_id', $usuarioId)->get();

        return response(['data' => $asistencias], 200);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'typeassistences' => 'required|boolean',
        ]);

        $asistencia = Assistances::find($id);

        if (!$asistencia) {
            return response(['message' => 'Asistencia no encontrada'], 404);
        }

        $asistencia->presente = $request->presente;
        $asistencia->save();

        return response(['message' => 'Asistencia actualizada correctamente', 'data' => $asistencia], 200);
    }
}
