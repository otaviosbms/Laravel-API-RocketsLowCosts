<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // usuarios

    public function CriarUsuario(Request $request)
    {

        $user = User::create($request->all());

        return response()->json(['message' => "Usuario '$user' criado com sucesso"], 201);
        
    }



}
