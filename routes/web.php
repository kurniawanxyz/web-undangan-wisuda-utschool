<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\monitor\MonitorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/admin")->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get("/login", AuthenticationController::class)->name('login.view');
        Route::post("/login", [AuthenticationController::class, 'login'])->name('login');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::get("/dashboard", DashboardController::class)->name('dashboard');
        Route::get("/user/invitation/{user_id}", [DashboardController::class, "download_pdf"])->name('get-invitation');
        Route::delete("/user/delete/{user_id}", [KehadiranController::class, 'delete'])->name('delete-user');

        Route::get("/user/download/all-pdf", [DashboardController::class, 'download_all_pdf'])->name('download_all_pdf');
        Route::get("/user/export", [DashboardController::class, 'export'])->name('export');
        Route::post("/tutup-formulir", [DashboardController::class, 'open_close_form'])->name('open_close_form');
        Route::post("/konfirmasi-kehadiran", [DashboardController::class, 'confirmation_present'])->name('confirmation_present');
    });
});

Route::post("/logout", [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/monitor', MonitorController::class)->name('monitor.index');

Route::controller(KehadiranController::class)->group(function () {
    Route::get('/', 'index')->name('kehadiran.index');
     Route::get('/store', function(){return to_route('kehadiran.index');});
     Route::post('/store', 'store')->name('kehadiran.store');
});
