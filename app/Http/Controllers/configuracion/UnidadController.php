<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\configuracion\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadController extends Controller
{
    public function index() {
        $unidades = Unidad::all();

        return response()->json($unidades);
    }

    public function create(Request $request) {
        try {
            DB::beginTransaction();
                $unidad = new Unidad();
                $unidad->fill($request->all());
                $unidad->save();
            DB::commit();
            
            return response()->json([
                'success' => true,
                'mensaje' => "La unidad se registro exitosamente",
                'unidad' => $unidad
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Ocurrio un error.'], 500);
        }
    }
}
