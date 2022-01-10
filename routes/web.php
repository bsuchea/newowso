<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| here is where you can register web Routes for your application. these
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. now create something great!
|
*/
Route::middleware(['auth', 'lang', 'auth.lock'])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'] )->name('dashboard');
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('users/get/dataTable', [\App\Http\Controllers\UserController::class, 'dataTable'])
        ->name('users.dataTable');

    Route::resource('roles', \App\Http\Controllers\RolePermissionController::class);
    Route::get('roles/get/dataTable', [\App\Http\Controllers\RolePermissionController::class, 'dataTable'])
        ->name('roles.dataTable');

    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    Route::get('services/get/dataTable', [\App\Http\Controllers\ServiceController::class, 'dataTable'])
        ->name('services.dataTable');

    Route::get('/services/{id}/lic', [\App\Http\Controllers\ServiceController::class, 'printLic'] )->name('services.print.lic');
    Route::get('/services/{id}/dis', [\App\Http\Controllers\ServiceController::class, 'printDis'] )->name('services.print.dis');

    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
    Route::get('customers/get/dataTable', [\App\Http\Controllers\CustomerController::class, 'dataTable'])
        ->name('customers.dataTable');

    Route::get('report', [\App\Http\Controllers\ReportController::class, 'service'])->name('report.services');

});

Route::get('login/locked', [\App\Http\Controllers\LockScreenController::class, 'locked'])
    ->middleware(['auth', 'lang'])
    ->name('login.locked');
Route::post('login/locked', [\App\Http\Controllers\LockScreenController::class, 'unlock'])->name('login.unlock');

require __dir__.'/auth.php';
