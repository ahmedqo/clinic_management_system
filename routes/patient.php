<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/patients', [PatientController::class, 'index_view'])->name('views.patients.index');
Route::get('/patients/create', [PatientController::class, 'create_view'])->name('views.patients.create');
Route::get('/patients/{id}/update', [PatientController::class, 'update_view'])->name('views.patients.update');
Route::get('/patients/{id}/summary', [PatientController::class, 'summary_view'])->name('views.patients.summary');

Route::post('/patients/create', [PatientController::class, 'create_action'])->name('actions.patients.create');
Route::post('/patients/{id}/update', [PatientController::class, 'update_action'])->name('actions.patients.update');
Route::get('/patients/{id}/delete', [PatientController::class, 'delete_action'])->name('actions.patients.delete');
