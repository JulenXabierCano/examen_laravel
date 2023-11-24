<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManzanaController;
use App\Http\Middleware\ManzanasMiddelware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manzanas', [ManzanaController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('manzanas');

Route::get('/crearManzana', [ManzanaController::class,'store'])
    ->middleware(['auth', 'verified'])
    ->name('crearManzana');

Route::get('/eliminarManzana/{id}', [ManzanaController::class, 'destroy'])
    ->middleware([ManzanasMiddelware::class,'auth', 'verified'])
    ->name('eliminarManzana');

Route::get('/actualizarManzana/{id}', [ManzanaController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('actualizarManzana');  

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
