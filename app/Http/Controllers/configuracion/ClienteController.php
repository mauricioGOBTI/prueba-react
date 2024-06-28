<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\CliesteRequest;
use App\Models\configuracion\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    public function create(Request $request) {
        try {
            DB::beginTransaction();
                $cliente = new Cliente();
                $cliente->fill($request->all());
                $cliente->save();
            DB::commit();
            
            return response()->json([
                'success' => true,
                'mensaje' => "El cliente se registro exitosamente",
                'cliente' => $cliente
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Ocurrio un error.'], 500);
        }
    }
}
