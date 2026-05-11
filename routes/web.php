<?php

use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/services', [PublicServiceController::class, 'index'])->name('public.services.index');
Route::get('/services/{service}', [PublicServiceController::class, 'show'])->name('public.services.show');
Route::post('/services/{service}/reserve', [PublicServiceController::class, 'reserve'])->name('public.services.reserve');

Route::prefix('admin')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('prestataires', PrestataireController::class);
    Route::resource('reservations', ReservationController::class);
});
