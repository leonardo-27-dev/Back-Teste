<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        return Usuarios::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return Usuarios::create($request->all());
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $existingEmail = Usuarios::where('email', $email)->first();
        $existingPassword = Usuarios::where('password', $password)->first();
    
        if ($existingEmail && $existingPassword) {
            return response()->json($existingEmail);
        }
    
        return response()->json(['message' => 'Usuario não encontrado'], 403);
    }

    public function update(Request $request, string $id)
    {
        $usuario = Usuarios::find($id);
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    
        $usuario->update($request->all());
    
        return response()->json($usuario);
    }

    public function delete(string $id)
    {
        $usuario = Usuarios::find($id);
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrada'], 404);
        }
    
        $usuario->delete();
    
        return response()->json(['message' => 'Usuário excluído com sucesso']);
    }
    
}
