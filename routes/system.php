<?php

use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

Route::get('/system', [SystemController::class, 'index_view'])->name('views.system.index');
Route::get('/dashboard', [SystemController::class, 'dashboard_view'])->name('views.dashboard.index');

Route::post('/appointment', [SystemController::class, 'appointment_action'])->name('actions.appointment.create');
Route::post('/system/update', [SystemController::class, 'update_action'])->name('actions.system.update');
