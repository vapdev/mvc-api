<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $alunos = Aluno::all();
        return response()->json($alunos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'matricula' => 'required|string|unique:alunos',
            'email' => 'required|email|unique:alunos',
            'nota' => 'required|numeric',
        ]);

        $aluno = Aluno::create($request->all());

        return response()->json($aluno, 201);
    }

    public function show(Aluno $aluno)
    {
        return response()->json($aluno);
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string',
            'matricula' => 'required|string|unique:alunos,Matricula,' . $aluno->id,
            'email' => 'required|email|unique:alunos,Email,' . $aluno->id,
            'nota' => 'required|numeric',
        ]);

        $aluno->update($request->all());

        return response()->json($aluno, 200);
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return response()->json(null, 204);
    }
}