<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SiteController;

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

// area
Route::get('/add-area',[AreaController::class,'addArea'])->name('add.area');
Route::post('/store-area',[AreaController::class,'storeArea'])->name('store.area');
Route::get('/all-area',[AreaController::class,'allArea'])->name('all.area');
Route::get('/edit-area/{id}',[AreaController::class,'editArea'])->name('edit.area');
Route::put('/update-area/{id}',[AreaController::class,'updateArea'])->name('update.area');
Route::get('/confirm-delete-area/{id}',[AreaController::class,'confirmDeleteArea'])->name('confirm.delete.area');
Route::get('/delete-area/{id}',[AreaController::class,'deleteArea'])->name('delete.area');

// site
Route::get('/add-site',[siteController::class,'addSite'])->name('add.site');
Route::post('/store-site',[siteController::class,'storeSite'])->name('store.site');
Route::get('/all-site',[siteController::class,'allSite'])->name('all.site');
Route::get('/edit-site/{id}',[siteController::class,'editSite'])->name('edit.site');
Route::put('/update-site/{id}',[siteController::class,'updateSite'])->name('update.site');
Route::get('/confirm-delete-site/{id}',[siteController::class,'confirmDeleteSite'])->name('confirm.delete.site');
Route::get('/delete-site/{id}',[siteController::class,'deleteSite'])->name('delete.site');
