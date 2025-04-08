<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Zone;
use App\Models\Table;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    foreach(User::all() as $usuario) {
        dump($usuario->toArray());
    }
});

Route::get('/test2', function () {
    $zone = Zone::first();
    dump($zone->tables);
});

Route::get('/test3', function () {
    $table = Table::with('zone')->first();
    dump($table);
    dump($table->zone);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
