<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/admin/dashboard', function () {
    //     return "welcome admin";
    // })->middleware(['admin.only']);

    // Route::get('/hr/reports', function () {
    //     return "welcome hr";
    // })->middleware(['hr.access']);

    // Route::get('/employee/portal', function () {
    //     return "welcome employee";
    // })->middleware(['employee.or.higher']);

    Route::resource('employees', EmployeeController::class)->middleware('check.role:admin,hr');
    Route::resource('parameters', ParameterController::class)->middleware('role.hierarchy:hr');
});






require __DIR__ . '/auth.php';
