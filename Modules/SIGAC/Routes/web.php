<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Modules\SIGAC\Http\Controllers\AuthController;
use Modules\SIGAC\Http\Controllers\ApprenticesController;
use Modules\SIGAC\Http\Controllers\AssistancesController;
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

Route::post('/SIGAC/login', [AuthController::class, 'login'])->name('login');
Route::post('/SIGAC/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:api')->group(function () {


    Route::get('/SIGACapprentice', [ApprenticesController::class, 'getApprentices'])->name('apprentice');
    Route::post('/SIGAC/assistence', [AssistancesController::class, 'createAssistence'])->name('assistence');
    // Agrega otras rutas según tus necesidades
});
