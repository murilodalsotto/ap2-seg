<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/vendedor', [VendedorController::class, 'listar']);
route::get('/vendedor', [VendedorController::class, 'salvar']);
route::put('/vendedor/{id}', [VendedorController::class, 'editar']);
route::delete('/vendedor/{id}', [VendedorController::class, 'excluir']);
route::get('/vendedor/{id}', [VendedorController::class, 'listarPeloId']);

route::post('/produto', [ProdutoController::class, 'listar']);
route::get('/produto', [ProdutoController::class, 'salvar']);
route::put('/produto/{id}', [ProdutoController::class, 'editar']);
route::delete('/produto/{id}', [ProdutoController::class, 'excluir']);
route::get('/produto/{id}', [ProdutoController::class, 'listarPeloId']);

