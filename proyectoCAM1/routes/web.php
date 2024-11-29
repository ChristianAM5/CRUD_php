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

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\AnimalController;

Route::get('animales', [AnimalController::class, 'index'])->name('animales.index');
Route::get('animales/create', [AnimalController::class, 'create'])->name('animales.create');
Route::post('animales', [AnimalController::class, 'store'])->name('animales.store');
Route::get('animales/{id}/edit', [AnimalController::class, 'edit'])->name('animales.edit');
Route::put('animales/{id}', [AnimalController::class, 'update'])->name('animales.update');
Route::delete('animales/{id}', [AnimalController::class, 'destroy'])->name('animales.destroy');
Route::get('animales/{id}', [AnimalController::class, 'show'])->name('animales.show');
