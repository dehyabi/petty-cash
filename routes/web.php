<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\MenuLokasiController;
use App\Http\Controllers\MenuUserController;

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

// petty cash 
Route::get('/add-petty-cash',[PettyCashController::class,'addPettyCash'])->name('add.petty.cash');

// menu user
Route::get('/menu-user',[MenuUserController::class,'menuUser'])->name('menu.user');

// user
Route::get('/add-user',[userController::class,'addUser'])->name('add.user');
Route::post('/store-user',[userController::class,'storeUser'])->name('store.user');
Route::get('/all-user',[userController::class,'allUser'])->name('all.user');
Route::get('/edit-user/{id}',[userController::class,'editUser'])->name('edit.user');
Route::put('/update-user/{id}',[userController::class,'updateUser'])->name('update.user');
Route::get('/confirm-delete-user/{id}',[userController::class,'confirmDeleteUser'])->name('confirm.delete.user');
Route::get('/delete-user/{id}',[userController::class,'deleteUser'])->name('delete.user');

// group user
Route::get('/add-group-user',[GroupUserController::class,'addGroupUser'])->name('add.group.user');
Route::post('/store-group-user',[GroupUserController::class,'storeGroupUser'])->name('store.group.user');
Route::get('/all-group-user',[GroupUserController::class,'allGroupUser'])->name('all.group.user');
Route::get('/edit-group-user/{id}',[GroupUserController::class,'editGroupUser'])->name('edit.group.user');
Route::put('/update-group-user/{id}',[GroupUserController::class,'updateGroupUser'])->name('update.group.user');
Route::get('/confirm-delete-group-user/{id}',[GroupUserController::class,'confirmDeleteGroupUser'])->name('confirm.delete.group.user');
Route::get('/delete-group-user/{id}',[GroupUserController::class,'deleteGroupUser'])->name('delete.group.user');


// menu lokasi
Route::get('/menu-lokasi',[MenuLokasiController::class,'menuLokasi'])->name('menu.lokasi');

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
