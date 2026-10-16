<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




// requieres only authentication
Route::middleware(['authenticationMiddlewares'])->group(function () {
    Route::get('/', function () {
        // return redirect()->route('homepage');
        return redirect()->route('loginPage');
    });

    Route::get('login', [AuthController::class, 'login'])->name('loginPage');
});

// members routes
Route::middleware(['authenticationMiddlewares', 'studentMiddlewares'])->group(function () {
    // Route::get('member/dashboard', [DashboardController::class, 'dashboard'])->name('memberDashboard');

});

// administrators routes
Route::middleware(['authenticationMiddlewares', 'adminMiddlewares'])->group(function () {
    // Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('adminDashboard');
});
