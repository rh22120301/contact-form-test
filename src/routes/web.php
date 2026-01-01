<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/thanks', [ContactController::class, 'thanks']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/reset', [AdminController::class, 'reset']);
});






Route::post('/export', [ContactController::class, 'export']);