<?php

use App\Http\Controllers\CommentController;
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

Route::resource('posts', PostController::class);

Route::post('/posts/{post}', [CommentController::class, 'store'])
    ->name('comments.store');

Route::delete('/posts/{post}/comment/{comment:id}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');

// Rutas para gestionar el perfil de cada usuario.
Route::view('perfil', 'perfil.perfil')
->name('perfil');
Route::put('perfil', [PerfilController::class, 'update'])
->name('perfil.update');

require __DIR__.'/auth.php';
