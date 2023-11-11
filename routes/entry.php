<?php

use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;


Route::get('/entries', [EntryController::class, 'index_view'])->name('views.entries.index');
Route::get('/entries/create', [EntryController::class, 'create_view'])->name('views.entries.create');
Route::get('/entries/{id}/update', [EntryController::class, 'update_view'])->name('views.entries.update');

Route::post('/entries/create', [EntryController::class, 'create_action'])->name('actions.entries.create');
Route::post('/entries/{id}/update', [EntryController::class, 'update_action'])->name('actions.entries.update');
Route::delete('/entries/{id}/delete', [EntryController::class, 'delete_action'])->name('actions.entries.delete');
