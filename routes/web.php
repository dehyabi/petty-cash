<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//redirect route
Route::get('/', function () {
    return redirect()->route('all.employee');
});

//employee routes
Route::get('/add-employee',[EmployeeController::class,'addEmployee'])->name('add.employee');
Route::post('/store-employee',[EmployeeController::class,'storeEmployee'])->name('store.employee');
Route::get('/all-employee',[EmployeeController::class,'allEmployee'])->name('all.employee');
Route::get('/edit-employee/{id}',[EmployeeController::class,'editEmployee'])->name('edit.employee');
Route::put('/update-employee/{id}',[EmployeeController::class,'updateEmployee'])->name('update.employee');
Route::get('/confirm-delete-employee/{id}',[EmployeeController::class,'confirmDeleteEmployee'])->name('confirm.delete.employee');
Route::get('/delete-employee/{id}',[EmployeeController::class,'deleteEmployee'])->name('delete.employee');

// lokasi outlet
Route::get('/add-lokasi',[LokasiController::class,'addLokasi'])->name('add.lokasi');

// city
Route::get('/add-city',[CityController::class,'addCity'])->name('add.city');
Route::post('/store-city',[CityController::class,'storeCity'])->name('store.city');
Route::get('/all-city',[CityController::class,'allCity'])->name('all.city');
Route::get('/edit-city/{id}',[CityController::class,'editCity'])->name('edit.city');
Route::put('/update-city/{id}',[CityController::class,'updateCity'])->name('update.city');
Route::get('/confirm-delete-city/{id}',[CityController::class,'confirmDeleteCity'])->name('confirm.delete.city');
Route::get('/delete-city/{id}',[CityController::class,'deleteCity'])->name('delete.city');
