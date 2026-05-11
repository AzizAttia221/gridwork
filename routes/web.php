<?php

use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServiceController::class, 'index'])->name('home');
Route::resource('services', ServiceController::class);
Route::resource('prestataires', PrestataireController::class);
Route::resource('reservations', ReservationController::class);
