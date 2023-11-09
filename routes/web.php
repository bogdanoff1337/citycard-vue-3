<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CityController;
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

Route::post('/api/register', [RegisterController::class,'register']);
Route::post('/api/login', [RegisterController::class, 'login']);
Route::post('/api/logout', [RegisterController::class,'logout']);
Route::get('/api/check-auth', [RegisterController::class, 'checkAuth']);
Route::get('{any?}', fn () => view('app'))->where('any', '.*');


Route::get('/get-sity', [CityController::class, 'index']);