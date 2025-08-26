<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $role = Auth::user()?->role;

    switch ($role) {
        case 'admin':
            return redirect()->route('dashboard.admin');
        case 'hr':
            return redirect()->route('dashboard.hr');
        case 'employee':
            return redirect()->route('dashboard');
        default:
            return view('auth.login');
    }
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('payrolls/generate', [PayrollController::class, 'create'])->name('payrolls.create');
    Route::post('payrolls/generate', [PayrollController::class, 'store'])->name('payrolls.store');

    Route::resource('employees', EmployeeController::class)->middleware('check.role:admin,hr');
    Route::resource('parameters', ParameterController::class)->middleware('role.hierarchy:hr');
    Route::resource('payrolls', PayrollController::class)->middleware('role.hierarchy:hr');

    Route::prefix('reports')->middleware('role.hierarchy:hr')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/monthly', [ReportController::class, 'monthly'])->name('reports.monthly');
        Route::get('/employee/{employee}', [ReportController::class, 'employee'])->name('reports.employee');
    });

    Route::middleware(['auth', 'admin.only'])->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    });

    Route::middleware(['auth', 'hr.access'])->group(function () {
        Route::get('/dashboard/hr', [DashboardController::class, 'hr'])->name('dashboard.hr');
    });
});






require __DIR__ . '/auth.php';
