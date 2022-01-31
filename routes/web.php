<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('site.index'); })->name('index');

Route::prefix('entrada')->group(function () {
    Route::get('/', [EntradaController::class, 'index'])->name('site.entrada');
    Route::get('/cadastrar', [EntradaController::class, 'create'])->name('site.entrada.create');
    Route::post('/cadastrar', [EntradaController::class, 'store'])->name('site.entrada.store');
});


Route::prefix('fornecedor')->group(function () {
    Route::get('/', [FornecedorController::class, 'index'])->name('site.fornecedor');
    Route::get('/cadastrar', [FornecedorController::class, 'create'])->name('site.cadastrar.fornecedor');
    Route::post('/cadastrar', [FornecedorController::class, 'store'])->name('site.cadastrar.fornecedor');
    Route::get('/edit/{id}', [FornecedorController::class, 'edit'])->name('site.editar.fornecedor');
    Route::post('/update/{id}', [FornecedorController::class, 'update'])->name('site.editar.fornecedor');
    Route::get('/destroy/{id}', [FornecedorController::class, 'destroy'])->name('site.delete.destroy');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('site.clientes');
    Route::get('/cadastrar', [ClienteController::class, 'create'])->name('site.cadastrar-cliente');
    Route::post('/cadastrar', [ClienteController::class, 'store'])->name('site.store-cliente');
    Route::get('/editar/{id}', [ClienteController::class, 'edit'])->name('site.editar-cliente');
    Route::post('/editar/{id}', [ClienteController::class, 'update'])->name('site.editar-cliente');
    Route::get('/delete/{id}', [ClienteController::class, 'destroy'])->name('site.delete-cliente');
});
Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('site.produtos');
    Route::get('/cadastrar', [ProdutoController::class, 'create'])->name('site.cadastrar-produto');
    Route::post('/cadastrar', [ProdutoController::class, 'store'])->name('site.cadastrar-produto');
    Route::get('/editar/{id}', [ProdutoController::class, 'edit'])->name('site.editar-produto');
    Route::post('/editar/{id}', [ProdutoController::class, 'update'])->name('site.editar-produto');
    Route::get('/delete/{id}', [ProdutoController::class, 'destroy'])->name('site.delete-produto');
});

Route::prefix('vendas')->group(function () {
    Route::get('/vendas', [VendaController::class, 'index'])->name('site.vendas');
    Route::get('/visualizar/{id}', [VendaController::class, 'show'])->name('site.visualizar-venda');
    Route::get('/atualizar/{id}', [VendaController::class, 'edit'])->name('site.atualizar-venda');
    Route::post('/atualizar/{id}', [VendaController::class, 'update'])->name('site.atualizar-venda');
});

Route::get('/realizar-venda', [VendaController::class, 'create'])->name('site.realizar-venda');
Route::post('/realizar-venda', [VendaController::class, 'store'])->name('site.realizar-venda');
Route::get('/vendas/delete/{id}', [VendaController::class, 'destroy'])->name('site.delete-venda');


