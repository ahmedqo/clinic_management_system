<?php

use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Route;


Route::get('/prescriptions', [PrescriptionController::class, 'index_view'])->name('views.prescriptions.index');
Route::get('/prescriptions/create', [PrescriptionController::class, 'create_view'])->name('views.prescriptions.create');
Route::get('/prescriptions/{id}/update', [PrescriptionController::class, 'update_view'])->name('views.prescriptions.update');
Route::get('/prescriptions/{id}/summary', [PrescriptionController::class, 'summary_view'])->name('views.prescriptions.summary');

Route::post('/prescriptions/create', [PrescriptionController::class, 'create_action'])->name('actions.prescriptions.create');
Route::post('/prescriptions/{id}/update', [PrescriptionController::class, 'update_action'])->name('actions.prescriptions.update');
Route::get('/prescriptions/{id}/delete', [PrescriptionController::class, 'delete_action'])->name('actions.prescriptions.delete');
