<?php

use App\Http\Controllers\OngController;
use App\Http\Controllers\PetController;
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
    return view('welcome');
});

// Ongs
Route::get('/ongs', [OngController::class, 'listAll']);

Route::get('/ongs/cadastro', [OngController::class, 'insert']);
Route::post('/ongs/cadastro', [OngController::class, 'insert']);

Route::get('/ongs/remover/{id}', [OngController::class, 'remove']);


// Pets
Route::get('/pets', [PetController::class, 'listAll']);

Route::get('/pets/cadastro', [PetController::class, 'insert']);
Route::post('/pets/cadastro', [PetController::class, 'insert']);

Route::get('/pets/remove/{id}', [PetController::class, 'remove']);