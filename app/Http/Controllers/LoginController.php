<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Login:


    public function Login(Request $request)
    {
        $nome = $request->input('nome');

        $user = User::where('nome', $nome)->first();

        if ($user) {

            $token = $user->createToken('token');

            $user = Auth::user();

            return response()->json($token->plainTextToken);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }
}
