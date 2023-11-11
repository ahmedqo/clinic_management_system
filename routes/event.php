<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/events', [EventController::class, 'index_view'])->name('views.events.index');
Route::get('/events/create', [EventController::class, 'create_view'])->name('views.events.create');
Route::get('/events/{id}/update', [EventController::class, 'update_view'])->name('views.events.update');

Route::post('/events/create', [EventController::class, 'create_action'])->name('actions.events.create');
Route::post('/events/{id}/update', [EventController::class, 'update_action'])->name('actions.events.update');
Route::delete('/events/{id}/delete', [EventController::class, 'delete_action'])->name('actions.events.delete');
