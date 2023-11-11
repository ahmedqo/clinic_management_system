<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;


Route::get('/documents', [DocumentController::class, 'index_view'])->name('views.documents.index');
Route::get('/documents/create', [DocumentController::class, 'create_view'])->name('views.documents.create');
Route::get('/documents/{id}/summary', [DocumentController::class, 'summary_view'])->name('views.documents.summary');

Route::post('/documents/create', [DocumentController::class, 'create_action'])->name('actions.documents.create');
Route::delete('/documents/{id}/delete', [DocumentController::class, 'delete_action'])->name('actions.documents.delete');
