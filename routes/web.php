<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\CardController;


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


Route::get('/', [CalculateController::class, 'index']);
Route::post('/calculate', [CalculateController::class, 'calculate']);
Route::get('/card-display', [CardController::class, 'index']);
