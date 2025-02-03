<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::post('/midtrans-callback', [PembayaranController::class, 'callback'])->name('callback')->withoutMiddleware('auth:sanctum');
