<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index_view'])->name('views.users.index');
Route::get('/users/create', [UserController::class, 'create_view'])->name('views.users.create');
Route::get('/users/{id}/update', [UserController::class, 'update_view'])->name('views.users.update');

Route::post('/users/create', [UserController::class, 'create_action'])->name('actions.users.create');
Route::post('/users/{id}/update', [UserController::class, 'update_action'])->name('actions.users.update');
Route::patch('/users/{id}/status', [UserController::class, 'status_action'])->name('actions.users.status');
Route::get('/users/{id}/delete', [UserController::class, 'delete_action'])->name('actions.users.delete');
