<?php

use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;


Route::get('/records', [RecordController::class, 'index_view'])->name('views.records.index');
Route::get('/records/create', [RecordController::class, 'create_view'])->name('views.records.create');
Route::get('/records/{id}/update', [RecordController::class, 'update_view'])->name('views.records.update');

Route::post('/records/create', [RecordController::class, 'create_action'])->name('actions.records.create');
Route::post('/records/{id}/update', [RecordController::class, 'update_action'])->name('actions.records.update');
Route::delete('/records/{id}/delete', [RecordController::class, 'delete_action'])->name('actions.records.delete');
