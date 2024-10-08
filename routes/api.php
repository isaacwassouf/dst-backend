<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/login', [AuthController::class, "login"]);
Route::post('auth/register', [AuthController::class, "register"]);
Route::post('auth/logout', [AuthController::class, "logout"]);
Route::post('auth/rememberMe', [AuthController::class, "rememberMe"]);