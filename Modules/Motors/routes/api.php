<?php

use Illuminate\Support\Facades\Route;
use Modules\Motors\Http\Controllers\Api\DocumentsController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::group(['prefix' => 'motors/documents', 'controller' => DocumentsController::class], function () {
        Route::get('/{document}', 'show');
        Route::get('/', 'index');
        Route::post('/', 'store');
    });
});
