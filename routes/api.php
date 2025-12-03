<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






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

Route::apiResource('estates', EstateController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('blogs', BlogController::class);

// contact messages (admin)
Route::get('contact-messages', [ContactController::class,'index']);
Route::get('contact-messages/{id}', [ContactController::class,'show']);
Route::post('contact-messages/{id}/mark-read', [ContactController::class,'markAsRead']);

// settings
Route::get('settings', [SettingController::class,'index']);
Route::post('settings', [SettingController::class,'update']);
