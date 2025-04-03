<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('home');

Route::prefix('funcionario')->group(function(){
    Route::get('/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::post('/', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::get('/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
    Route::put('/{id}/edit', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
});

