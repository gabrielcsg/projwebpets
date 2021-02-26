<?php

use App\Http\Controllers\OngController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\InteressadoController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ongs
Route::get('/ongs', [OngController::class, 'listAll']);

Route::get('/ongs/cadastro', [OngController::class, 'insert'])->name('cadastro_ong');
Route::post('/ongs/cadastro', [OngController::class, 'insert']);

// Interessados
Route::get('/register', [InteressadoController::class, 'insert'])->name('register');
Route::post('/interessados/cadastro', [InteressadoController::class, 'create']);

// Rotas protegidas
Route::group(['middleware' => ['auth']], function () {
    // Pets
    Route::get('/pets', [PetController::class, 'listByOng']);

    Route::get('/pets/cadastro', [PetController::class, 'insert']);
    Route::post('/pets/cadastro', [PetController::class, 'insert']);

    Route::get('/pets/remove/{id}', [PetController::class, 'remove']);

    Route::get('/pets/editar/{id}', [PetController::class, 'update']);
    Route::post('/pets/editar/{id}', [PetController::class, 'update']);

    Route::get('/pets/{pet_id}/interessados', [PetController::class, 'listInteressados']);
    Route::get('/pets/{pet_id}/interessados/aceitar/{interessado_id}', [PetController::class, 'aceitarSolicitacao']);

    Route::get('/pets/disponibilidade/{id}', [PetController::class, 'trocarDisponibilidade']);

    // Interesse em um Pet
    Route::get('/pets/candidatar/{id}', [PetController::class, 'candidatar']);
    Route::get('/pets/retirarInteresse/{id}', [PetController::class, 'retirarInteresse']);
    Route::get('/interesses', [PetController::class, 'listByInteressado']);

    // Ongs
    Route::get('/ongs/remover/{id}', [OngController::class, 'remove']);
});
