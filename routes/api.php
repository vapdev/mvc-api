<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;

Route::middleware(['api'])->group(function () {
    // Authentication routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);

    // Aluno routes
    Route::get('/alunos', [AlunoController::class, 'index']);
    Route::post('/alunos', [AlunoController::class, 'store']);
    Route::get('/alunos/{aluno}', [AlunoController::class, 'show']);
    Route::put('/alunos/{aluno}', [AlunoController::class, 'update']);
    Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy']);

    // Professor routes
    Route::get('/professores', [ProfessorController::class, 'index']);
    Route::post('/professores', [ProfessorController::class, 'store']);
    Route::get('/professores/{professor}', [ProfessorController::class, 'show']);
    Route::put('/professores/{professor}', [ProfessorController::class, 'update']);
    Route::delete('/professores/{professor}', [ProfessorController::class, 'destroy']);
});