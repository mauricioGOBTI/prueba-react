<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\configuracion\Aseguradora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AseguradoraController extends Controller
{
    public function index() {
        try {
            $aseguradoras = Aseguradora::all();
    
            return response()->json([
                'success' => true,
                'aseguradoras' => $aseguradoras
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Ocurrio un error.'], 500);
        }
    }

    public function create(Request $request) {
        try {
            $validatedData = $request->validate([
                'correo_contacto' => 'required|email|unique:aseguradoras,correo_contacto'
            ]);
            
            DB::beginTransaction();
                $aseguradora = new Aseguradora();
                $aseguradora->fill($validatedData);
                $aseguradora->save();
            DB::commit();
            
            return response()->json([
                'success' => true,
                'mensaje' => "La aseguradora se registró exitosamente",
                'aseguradora' => $aseguradora
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Error de validación.', 'detalles' => $e->errors()], 422);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Ocurrió un error inesperado.'], 500);
        }
    }
}
