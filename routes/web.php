<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProvincesController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [RegionController::class, 'index'])->name('dashboard');
    Route::get('/cities', [CitiesController::class, 'index'])->name('cities');
    Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
    Route::get('/provinces', [ProvincesController::class, 'index'])->name('provinces');

    // Display ditailes routes
    Route::get('/regions/{regionId}/cities', [CitiesController::class, 'showByRegion'])->name('regions.cities');
    Route::get('cities/{cityId}/provinces', [ProvincesController::class, 'showByCity'])->name('cities.provinces');
    Route::get('provinces/{provinceId}/employees', [EmployeesController::class, 'showByProvince'])->name('provinces.employees');


    // DElete Routes
    Route::delete('/regions/{region}', [RegionController::class, 'destroy'])->name('regions.destroy');
    Route::delete('/cities/{city}', [CitiesController::class, 'destroy'])->name('cities.destroy');
    Route::delete('/provinces/{province}', [ProvincesController::class, 'destroy'])->name('provinces.destroy');
    Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

    // Update Routes


});

// ADD ROUTES
//Regions

Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');

Route::get('/regions', [RegionController::class, 'index'])->name('regions.index');

// Route to show the edit form for a region
Route::get('/regions/{id}/edit', [RegionController::class, 'edit'])->name('regions.edit');

// Route to update the region's data
Route::put('/regions/{id}', [RegionController::class, 'update'])->name('regions.update');

//Cities

// Route to display the city creation form
Route::get('/cities/create', [CitiesController::class, 'create'])->name('cities.create');

// Route to store the new city
Route::post('/cities', [CitiesController::class, 'store'])->name('cities.store');

Route::get('/cities', [CitiesController::class, 'index'])->name('cities.index');


// Route to show the update form
Route::get('/cities/{id}/edit', [CitiesController::class, 'edit'])->name('cities.edit');

// Route to update the city
Route::put('/cities/{id}', action: [CitiesController::class, 'update'])->name('cities.update');
Route::get('/cities/{region}', [CitiesController::class, 'getCitiesByRegion']);



//Provinces

use App\Http\Controllers\ProvinceController;

// Route to display the form for creating a new province
Route::get('/provinces/create', [ProvincesController::class, 'create'])->name('provinces.create');

// Route to handle the submission of the form and store the new province
Route::post('/provinces/store', [ProvincesController::class, 'store'])->name('provinces.store');

// Route to show all provinces (if needed)
Route::get('/provinces', [ProvincesController::class, 'index'])->name('provinces.index');

// Route to edit a province
Route::get('/provinces/{id}/edit', [ProvincesController::class, 'edit'])->name('provinces.edit');

// Route to update a province
Route::put('/provinces/{id}', [ProvincesController::class, 'update'])->name('provinces.update');

// Route to delete a province
Route::delete('/provinces/{id}', [ProvincesController::class, 'destroy'])->name('provinces.destroy');

//Employees

// Route::get('provinces/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
// Route::post('provinces/employees', [EmployeesController::class, 'store'])->name('employees.store');
// Route::get('provinces/employees', [EmployeesController::class, 'index'])->name('employees.index');

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');






 Route::get('/dashboard', [RegionController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); // This route should be fine

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
