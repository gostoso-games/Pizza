<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\Admin\AdminController as Admin;


Route::middleware('throttle:100,1')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');  
});
Route::get('/setadmin/{user}', [Admin::class, 'setadmin'])
    ->name('setadmin');

Route::middleware(['auth', 'throttle:20,1'])->prefix('admin')->group(function () {
    Route::get('/', [Admin::class, 'index'])->name('admin.index');
    Route::post('/Products', [Admin::class, 'storeProduct'])->name('admin.products');
    Route::put('/ProductsUpdate/{id}', [Admin::class, 'updateProduct'])->name('admin.updateProduct');
    Route::delete('/Destroy/{id}', [Admin::class, 'destroyProduct'])->name('admin.destroy');
});