<?php

use App\Http\Controllers\FogueteController;
use App\Http\Controllers\LancamentoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Login:

Route::post('/login', [LoginController::class,'Login'])->name('login');


// Usuarios:

Route::post('/login/create', [UserController::class,'CriarUsuario'])->name('criar.usuario');


// Salvar / reotornar dados de foguetes:

Route::get('/foguetes/create', [FogueteController::class,'SalvarFoguetes'])->name('salvar.foguetes');
Route::get('/foguetes', [FogueteController::class,'TodosFoguetes'])->name('todos.foguetes');
Route::get('/foguetes/{id}', [FogueteController::class,'UmFoguete'])->name('um.foguete');


// lançamento:

Route::post('/foguetes/lancamento/{id}', [LancamentoController::class,'CriarLancamento'])->name('criar.lancamento');
Route::get('/foguetes/lancamento', [LancamentoController::class,'TodosLancamentos'])->name('todos.lancamentos');



