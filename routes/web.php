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



Route::get('/', [App\Http\Controllers\watherController::class, 'Humedad'])->name('Humedad');
Route::get('/consultarciudades', [App\Http\Controllers\watherController::class, 'Consultarciudades'])->name('Consultarciudades');
Route::post('/saveconsulta',[App\Http\Controllers\watherController::class, 'Saveconsulta'])->name('Saveconsulta');
Route::get('/showhistorial',[App\Http\Controllers\watherController::class, 'Showhistorial'])->name('showhistorial');