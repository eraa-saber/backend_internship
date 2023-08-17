<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Users
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('addnew', [UserController::class, 'store']);
Route::put('updateuser/{id}', [UserController::class, 'update']);
Route::delete('delete/{id}', [UserController::class, 'destroy']);
//Service
Route::get('services', [ServiceController::class, 'index']);
Route::get('services/{id}', [ServiceController::class, 'show']);
Route::post('addservice', [ServiceController::class, 'store']);
Route::delete('deleteservice/{id}', [ServiceController::class, 'destroy']);
Route::put('updateservice/{id}', [ServiceController::class, 'update']);
