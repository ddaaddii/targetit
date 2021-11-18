<?php

use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UsuarioController;
use App\Tipo_Usuario;
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
    return view('home');
})->middleware(['auth']);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit']);
Route::get('/usuarios/deleted/{id}/edit', [UsuarioController::class, 'edit']);
Route::patch('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{user}', [UsuarioController::class, 'destroy']);
Route::post('/usuarios/{user}/restaurar', [UsuarioController::class, 'restaurar']);

Route::get('/usuarios/permissoes', [UsuarioController::class, 'permissoes_index'] );
Route::get('/usuarios/permissoes/create', [UsuarioController::class, 'permissoes_create']);
Route::post('/usuarios/permissoes/create', [UsuarioController::class, 'permissoes_store']);
Route::get('/usuarios/permissoes/{tipo_usuario}/edit', [UsuarioController::class, 'permissoes_edit']);
Route::patch('/usuarios/permissoes/{tipo_usuario}', [UsuarioController::class, 'permissoes_update']);
Route::delete('/usuarios/permissoes/{tipo_usuario}', [UsuarioController::class, 'permissoes_destroy']);

Route::get('/enderecos', [EnderecoController::class, 'index']);
Route::get('/enderecos/create', [EnderecoController::class, 'create']);
Route::post('/enderecos', [EnderecoController::class, 'store']);
Route::get('/enderecos/{id}/edit', [EnderecoController::class, 'edit']);
Route::get('/enderecos/deleted/{id}/edit', [EnderecoController::class, 'edit']);
Route::patch('/enderecos/{id}', [EnderecoController::class, 'update']);
Route::delete('/enderecos/{endereco}', [EnderecoController::class, 'destroy']);
Route::post('/enderecos/{endereco}/restaurar', [EnderecoController::class, 'restaurar']);

require __DIR__.'/auth.php';
