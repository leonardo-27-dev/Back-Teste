<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tarefas;

class TarefasController extends Controller
{
    public function index()
    {
        return Tarefas::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'estado' => 'required',
            'user_id' => 'required',
        ]);

        return Tarefas::create($request->all());
    }

    public function show(string $id)
    {
        return Tarefas::findOrfail($id);
    }

    public function update(Request $request, string $id)
    {
        $tarefa = Tarefas::find($id);
    
        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
    
        $tarefa->estado = $request->input('estado');
        $tarefa->save();
    
        return response()->json($tarefa);
    }
    
    
    public function delete(string $id)
    {
        $tarefa = Tarefas::find($id);
    
        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
    
        $tarefa->delete();
    
        return response()->json(['message' => 'Tarefa excluída com sucesso']);
    }
    
}
