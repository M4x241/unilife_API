<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login and get JWT token
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        // Find user by email
        $universitario = \App\Models\Universitario::where('correo', $credentials['correo'])->first();

        if (!$universitario) {
            return response()->json([
                'error' => 'Credenciales inválidas',
                'message' => 'El correo no está registrado'
            ], 401);
        }

        // Verify password
        if (!\Hash::check($credentials['contrasena'], $universitario->contrasena)) {
            return response()->json([
                'error' => 'Credenciales inválidas',
                'message' => 'La contraseña es incorrecta'
            ], 401);
        }

        // Generate JWT token
        $token = \JWTAuth::fromUser($universitario);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60, // Convert minutes to seconds
            'user' => [
                'id' => $universitario->id,
                'cu' => $universitario->cu,
                'nombres' => $universitario->nombres,
                'apellidos' => $universitario->apellidos,
                'correo' => $universitario->correo,
                'nombre_completo' => $universitario->nombre_completo,
            ]
        ]);
    }

    /**
     * Get authenticated user
     */
    public function me()
    {
        try {
            $user = \JWTAuth::parseToken()->authenticate();
            
            return response()->json([
                'id' => $user->id,
                'cu' => $user->cu,
                'nombres' => $user->nombres,
                'apellidos' => $user->apellidos,
                'correo' => $user->correo,
                'nombre_completo' => $user->nombre_completo,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token inválido'], 401);
        }
    }

    /**
     * Logout (invalidate token)
     */
    public function logout()
    {
        try {
            \JWTAuth::invalidate(\JWTAuth::getToken());
            return response()->json(['message' => 'Sesión cerrada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al cerrar sesión'], 500);
        }
    }

    /**
     * Refresh token
     */
    public function refresh()
    {
        try {
            $newToken = \JWTAuth::refresh(\JWTAuth::getToken());
            return response()->json([
                'access_token' => $newToken,
                'token_type' => 'bearer',
                'expires_in' => config('jwt.ttl') * 60,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo refrescar el token'], 401);
        }
    }
}
