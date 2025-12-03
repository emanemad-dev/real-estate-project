<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
Route::get('/estates/{id}', [EstateController::class, 'show'])->name('estates.show');

