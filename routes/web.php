<?php

use App\Http\Controllers\OngController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\InteressadoController;
use App\Http\Controllers\EnderecoController;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ongs
Route::get('/ongs', [OngController::class, 'listAll']);

Route::get('/ongs/cadastro', [OngController::class, 'insert'])->name('cadastro_ong');
Route::post('/ongs/cadastro', [OngController::class, 'insert']);

Route::get('/ongs/remover/{id}', [OngController::class, 'remove']);

// Pets
Route::get('/pets', [PetController::class, 'listAll']);

Route::get('/pets/cadastro', [PetController::class, 'insert']);
Route::post('/pets/cadastro', [PetController::class, 'insert']);

Route::get('/pets/remove/{id}', [PetController::class, 'remove']);

// Interessados
//Route::get('/interessados', [InteressadoController::class, 'listAll']);

Route::post('/interessados/cadastro', [InteressadoController::class, 'create']);

// Enderecos
//Route::get('/enderecos', [EnderecoController::class, 'listAll']);

Route::get('/enderecos/cadastro', [EnderecoController::class, 'insert']);
Route::post('/enderecos/cadastro', [EnderecoController::class, 'create']);


Auth::routes();

Route::get('/register', [InteressadoController::class, 'insert'])->name('register');

