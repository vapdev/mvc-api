<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor; // Make sure to import the Professor model

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $professores = Professor::all();
        return response()->json($professores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string',
            'Matricula' => 'required|string|unique:alunos',
            'Email' => 'required|email|unique:alunos',
            'user_id' => 'required|exists:users,id',
        ]);

        $professor = Professor::create($request->all());

        return response()->json($professor, 201);
    }

    public function show(Professor $professor)
    {
        return response()->json($professor);
    }

    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'Nome' => 'required|string',
            'Matricula' => 'required|string|unique:alunos,Matricula,' . $professor->id,
            'Email' => 'required|email|unique:alunos,Email,' . $professor->id,
            'user_id' => 'required|exists:users,id',
        ]);

        $professor->update($request->all());

        return response()->json($professor, 200);
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        return response()->json(null, 204);
    }
}