<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::get('/invoices', [InvoiceController::class, 'index_view'])->name('views.invoices.index');
Route::get('/invoices/create', [InvoiceController::class, 'create_view'])->name('views.invoices.create');
Route::get('/invoices/{id}/update', [InvoiceController::class, 'update_view'])->name('views.invoices.update');
Route::get('/invoices/{id}/summary', [InvoiceController::class, 'summary_view'])->name('views.invoices.summary');

Route::post('/invoices/create', [InvoiceController::class, 'create_action'])->name('actions.invoices.create');
Route::post('/invoices/{id}/update', [InvoiceController::class, 'update_action'])->name('actions.invoices.update');
Route::get('/invoices/{id}/delete', [InvoiceController::class, 'delete_action'])->name('actions.invoices.delete');
