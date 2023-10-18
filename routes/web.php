<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['locale']], function () {
    Route::get('/language/{locale}', function ($locale) {
        app()->setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('actions.language.index');

    require __DIR__ . '/auth.php';

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', function () {
            return redirect()->route('views.login.index');
        });
    });

    Route::group(['middleware' => ['auth']], function () {
        require __DIR__ . '/profile.php';

        require __DIR__ . '/appointment.php';
        require __DIR__ . '/patient.php';
        require __DIR__ . '/contact.php';
        require __DIR__ . '/record.php';
        require __DIR__ . '/entry.php';
        require __DIR__ . '/prescription.php';
        require __DIR__ . '/document.php';
        require __DIR__ . '/invoice.php';

        require __DIR__ . '/event.php';
        require __DIR__ . '/user.php';
        require __DIR__ . '/system.php';

        Route::get('/', function () {
            return redirect()->route('views.dashboard.index');
        });
    });
});
