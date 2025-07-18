<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\CompanyScheduling;

use \App\Services\GoogleService;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) return response()->json(['success' => false, 'message' => 'O e-mail e/ou senha estão incorretos! Por favor, verifica-los.'])->setStatusCode(401);
        else return response()->json(['success' => true, 'token' => $user->createToken($request->device_name)->plainTextToken, 'user' => $user])->setStatusCode(200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent()->setStatusCode(200);
    }

    public function me(Request $request)
    {
        return response()->json(['success' => true, 'user' => $request->user()])->setStatusCode(200);
    }
}