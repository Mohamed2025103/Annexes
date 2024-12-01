<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProvincesController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');



// Group all routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', action: [DashboardController::class, 'index'])->name('dashboard');

    // Provinces Routes
    Route::get('/provinces', [ProvincesController::class, 'index'])->name('provinces.index');
    Route::get('/provinces/create', [ProvincesController::class, 'create'])->name('provinces.create');
    Route::post('/provinces/store', [ProvincesController::class, 'store'])->name('provinces.store');
    Route::get('/provinces/{id}/edit', [ProvincesController::class, 'edit'])->name('provinces.edit');
    Route::put('/provinces/{id}', [ProvincesController::class, 'update'])->name('provinces.update');
    Route::delete('/provinces/{id}', [ProvincesController::class, 'destroy'])->name('provinces.destroy');

    // Employees Routes
    Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
    Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');


    // Route to show employees by province
    Route::get('provinces/{provinceId}/employees', [EmployeesController::class, 'showByProvince'])->name('provinces.employees');

});

// create content

















// Profile Routes (Separate middleware group)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__ . '/auth.php';
