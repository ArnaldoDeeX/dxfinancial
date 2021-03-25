<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App;


Route::prefix('/')->group(function () {
    Route::any('login', [App::class, 'login'])->name('login');
    Route::any('logout', [App::class, 'logout']);
    Route::any('/', function () {
        return redirect('login');
    });
    Route::any('/service/mpipn', [App::class, 'ipn']);
});

Route::prefix('app')->group(function () {
    Route::any('/', [App::class, 'dashboard'])->middleware('auth');
    Route::any('/customers', [App::class, 'customers'])->middleware('auth');
    Route::any('/plans', [App::class, 'plans'])->middleware('auth');
    Route::any('/invoices', [App::class, 'customersInvoices'])->middleware('auth');
});
