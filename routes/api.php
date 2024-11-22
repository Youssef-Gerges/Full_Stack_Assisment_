<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstallationController;

Route::post('/modules/migrate', [InstallationController::class, 'migrate']);
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('guest:sanctum');

