<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile/update', [ProfileController::class, 'profile_view'])->name('views.profile.update');
Route::get('/password/update', [ProfileController::class, 'password_view'])->name('views.password.update');

Route::post('/profile/update', [ProfileController::class, 'profile_action'])->name('actions.profile.update');
Route::post('/password/update', [ProfileController::class, 'password_action'])->name('actions.password.update');
