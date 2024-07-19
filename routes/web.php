<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/admin")->name('admin.')->group(function(){
    Route::get("/login", [AuthenticationController::class, 'showForm'])->name('login');
});
