<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends BaseController {
    public function getAllUsers(Request $request): JsonResponse {
        try {
            $users = User::all();
            return $this->sendResponse($users->toArray(), 'Usuarios encontrados.');
        } catch (\Throwable $th) {
            return $this->sendError('Usuarios no encontrados.', [], 404);
        }
    }

    public function createUser(Request $request): JsonResponse {
        try {
            DB::beginTransaction();
                $user = User::create($request->all());
                return $this->sendResponse($user->toArray(), 'Usuario creado.', 201);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Usuario no creado.', [], 404);
        }
    }
}
