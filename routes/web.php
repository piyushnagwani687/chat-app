<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('store-message/{userId}',[UserController::class, 'storeMessage'])->name('users.storeMessage');
    Route::resource('users', UserController::class)->middleware('auth');
    Route::get('messages/{senderId}/{receiverId}', [UserController::class, 'getMessages'])->name('getMessages');
    Route::get('load-messages/{senderId}/{receiverId}', [UserController::class, 'loadMessages'])->name('loadMessages');
});

require __DIR__.'/auth.php';
