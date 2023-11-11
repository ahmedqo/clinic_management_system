<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['check']], function () {
    Route::get('/appointments', [AppointmentController::class, 'index_view'])->name('views.appointments.index');
});
Route::get('/appointments/create', [AppointmentController::class, 'create_view'])->name('views.appointments.create');
Route::get('/appointments/{id}/update', [AppointmentController::class, 'update_view'])->name('views.appointments.update');

Route::post('/appointments/create', [AppointmentController::class, 'create_action'])->name('actions.appointments.create');
Route::post('/appointments/{id}/update', [AppointmentController::class, 'update_action'])->name('actions.appointments.update');
Route::delete('/appointments/{id}/delete', [AppointmentController::class, 'delete_action'])->name('actions.appointments.delete');
