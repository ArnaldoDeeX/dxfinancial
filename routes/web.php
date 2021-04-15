<?php

use App\Http\Controllers\App;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::any('login', [App::class, 'login'])->name('login');
    Route::any('logout', [App::class, 'logout'])->name('logout');
    Route::any('/', function () {
        return redirect('login');
    });
    Route::any('/service/mpipn', [App::class, 'ipn']);
});

Route::middleware('auth')->prefix('app')->group(function () {
    Route::any('/', [App::class, 'dashboard']);
    Route::any('/customers', [App::class, 'customers']);
    Route::any('/plans', [App::class, 'plans']);
    Route::any('/invoices', [App::class, 'customersInvoices']);
});
