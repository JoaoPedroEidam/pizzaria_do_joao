<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/controle', [App\Http\Controllers\PedidoController::class, 'controle'])->name("pedido.controle");
Route::POST('/pedido/realizar_pedido/{id}', [App\Http\Controllers\PedidoController::class, 'realizar_pedido'])->name("pedido.realizar_pedido");
Route::resource('produto', App\Http\Controllers\ProdutoController::class);
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('pedido', App\Http\Controllers\PedidoController::class);