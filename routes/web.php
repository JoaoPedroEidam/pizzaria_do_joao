<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('produto.index');;
})->middleware(['auth']);

Route::POST('/logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');

Route::get('/sair', function () {
    Auth::logout();
    return view('auth.login');
})->name('sair');


require __DIR__.'/auth.php';

Route::get('/controle', [App\Http\Controllers\PedidoController::class, 'controle'])->name("pedido.controle")->middleware(['auth']);
Route::POST('/pedido/realizar_pedido/{id}', [App\Http\Controllers\PedidoController::class, 'realizar_pedido'])->name("pedido.realizar_pedido")->middleware(['auth']);
Route::resource('produto', App\Http\Controllers\ProdutoController::class)->middleware(['auth']);
Route::resource('user', App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('pedido', App\Http\Controllers\PedidoController::class)->middleware(['auth']);
