<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MonografiaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rutas para gestionar el perfil de cada usuario.
Route::view('perfil', 'perfil.perfil')
->name('perfil');
Route::put('perfil', [PerfilController::class, 'update'])
->name('perfil.update');


Route::resource('monografias', MonografiaController::class)
    ->middleware('can:entrar-crud-monografias, auth');

Route::get('/articulos', [ArticuloController::class, 'index'])
    ->middleware('auth');

Route::get('/monografias/{monografia}/autores', [MonografiaController::class, 'monografia_autores'])
    ->middleware('auth');

require __DIR__.'/auth.php';
