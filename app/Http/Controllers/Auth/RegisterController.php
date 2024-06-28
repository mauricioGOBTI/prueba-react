<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller {
    public function login(Request $request): JsonResponse {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp', ['*'], Carbon::now()->addHours(1))->plainTextToken;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;

            $roles = $user->getRoleNames();
            $permissions = $user->getAllPermissions()->pluck('name');
   
            return response()->json([
                'success' => true,
                'data' => $success,
                'roles' => $roles,
                'permissions' => $permissions
            ]);
        } else { 
            return response()->json(['error'=>'Las credenciales son incorrectas.'], 401);
        } 
    }

    public function user(Request $request): JsonResponse {
        try {
            $user = $request->user();
            $roles = $user->getRoleNames();
            $permissions = $user->permissions->pluck('name');

            return response()->json([
                'success' => true,
                'data' => $user,
                'roles' => $roles,
                'permissions' => $permissions
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Usuario no encontrado.'], 404);
        }
    }

    public function getUserRoleAndPermissions(Request $request): JsonResponse {
        try {
            $user = $request->user();
            $roles = $user->getRoleNames();
            $permissions = $user->permissions->pluck('name');

            return response()->json([
                'success' => true,
                'roles' => $roles,
                'permissions' => $permissions
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Usuario no encontrado.'], 404);
        }
    }
}
