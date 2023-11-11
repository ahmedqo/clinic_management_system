<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/contacts', [ContactController::class, 'index_view'])->name('views.contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create_view'])->name('views.contacts.create');
Route::get('/contacts/{id}/update', [ContactController::class, 'update_view'])->name('views.contacts.update');

Route::post('/contacts/create', [ContactController::class, 'create_action'])->name('actions.contacts.create');
Route::post('/contacts/{id}/update', [ContactController::class, 'update_action'])->name('actions.contacts.update');
Route::delete('/contacts/{id}/delete', [ContactController::class, 'delete_action'])->name('actions.contacts.delete');
