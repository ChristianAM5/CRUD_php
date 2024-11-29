<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AnimalController;

Route::get('animales', [AnimalController::class, 'index']);
Route::get('animales/{id}', [AnimalController::class, 'show']);
Route::post('animales', [AnimalController::class, 'store']);
Route::put('animales/{id}', [AnimalController::class, 'update']);
Route::delete('animales/{id}', [AnimalController::class, 'destroy']);
