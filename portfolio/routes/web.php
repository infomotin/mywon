<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

Route::get('/', function () {
    return view('/frontend/index');
});

Route::get('/dashboard', function () {
    return view('/backend/admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin logout
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
