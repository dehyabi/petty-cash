<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\GroupPettyCashController;
use App\Http\Controllers\MenuPettyCashController;
use App\Http\Controllers\MenuLokasiController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\JenisPembelianController;
use App\Http\Controllers\MenuLaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuDashboardController;
use App\Http\Controllers\MasterLokasiController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\OutletController;

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
    return redirect()->route('menu.dashboard');
});

// menu dashboard
Route::get('/menu-dashboard',[MenuDashboardController::class,'menuDashboard'])->name('menu.dashboard');

// menu transaksi
Route::get('/add-transaksi',[TransaksiController::class,'addTransaksi'])->name('add.transaksi');
Route::post('/store-transaksi',[TransaksiController::class,'storeTransaksi'])->name('store.transaksi');
Route::get('/all-transaksi',[TransaksiController::class,'allTransaksi'])->name('all.transaksi');
Route::get('/edit-transaksi/{id}',[TransaksiController::class,'editTransaksi'])->name('edit.transaksi');
Route::put('/update-transaksi/{id}',[TransaksiController::class,'updateTransaksi'])->name('update.transaksi');
Route::get('/confirm-delete-transaksi/{id}',[TransaksiController::class,'confirmDeleteTransaksi'])->name('confirm.delete.transaksi');
Route::get('/delete-transaksi/{id}',[TransaksiController::class,'deleteTransaksi'])->name('delete.transaksi');

// menu laporan
Route::get('/menu-laporan',[MenuLaporanController::class,'menuLaporan'])->name('menu.laporan');

// menu petty cash 
Route::get('/menu-petty-cash',[MenuPettyCashController::class,'menuPettyCash'])->name('menu.petty.cash');

// petty cash
Route::get('/add-petty-cash',[PettyCashController::class,'addPettyCash'])->name('add.petty.cash');
Route::post('/store-petty-cash',[PettyCashController::class,'storePettyCash'])->name('store.petty.cash');
Route::get('/all-petty-cash',[PettyCashController::class,'allPettyCash'])->name('all.petty.cash');
Route::get('/edit-petty-cash/{id}',[PettyCashController::class,'editPettyCash'])->name('edit.petty.cash');
Route::put('/update-petty-cash/{id}',[PettyCashController::class,'updatePettyCash'])->name('update.petty.cash');
Route::get('/confirm-delete-petty-cash/{id}',[PettyCashController::class,'confirmDeletePettyCash'])->name('confirm.delete.petty.cash');
Route::get('/delete-petty-cash/{id}',[PettyCashController::class,'deletePettyCash'])->name('delete.petty.cash');

// group petty cash
Route::get('/add-group-petty-cash',[GroupPettyCashController::class,'addGroupPettyCash'])->name('add.group.petty.cash');
Route::post('/store-group-petty-cash',[GroupPettyCashController::class,'storeGroupPettyCash'])->name('store.group.petty.cash');
Route::get('/all-group-petty-cash',[GroupPettyCashController::class,'allGroupPettyCash'])->name('all.group.petty.cash');
Route::get('/edit-group-petty-cash/{id}',[GroupPettyCashController::class,'editGroupPettyCash'])->name('edit.group.petty.cash');
Route::put('/update-group-petty-cash/{id}',[GroupPettyCashController::class,'updateGroupPettyCash'])->name('update.group.petty.cash');
Route::get('/confirm-delete-group-petty-cash/{id}',[GroupPettyCashController::class,'confirmDeleteGroupPettyCash'])->name('confirm.delete.group.petty.cash');
Route::get('/delete-group-petty-cash/{id}',[GroupPettyCashController::class,'deleteGroupPettyCash'])->name('delete.group.petty.cash');

// menu user
Route::get('/menu-user',[MenuUserController::class,'menuUser'])->name('menu.user');
Route::get('/master-user',[MasterUserController::class,'masterUser'])->name('master.user');

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

// outlet
Route::get('/add-outlet',[OutletController::class,'addOutlet'])->name('add.outlet');
Route::post('/store-outlet',[OutletController::class,'storeOutlet'])->name('store.outlet');
Route::get('/all-outlet',[OutletController::class,'allOutlet'])->name('all.outlet');
Route::get('/edit-outlet/{id}',[OutletController::class,'editOutlet'])->name('edit.outlet');
Route::put('/update-outlet/{id}',[OutletController::class,'updateOutlet'])->name('update.outlet');
Route::get('/confirm-delete-outlet/{id}',[OutletController::class,'confirmDeleteOutlet'])->name('confirm.delete.outlet');
Route::get('/delete-outlet/{id}',[OutletController::class,'deleteOutlet'])->name('delete.outlet');

// master lokasi
Route::get('/master-lokasi',[MasterLokasiController::class,'masterLokasi'])->name('master.lokasi');

// jenis pembelian
Route::get('/add-jenis-pembelian',[JenisPembelianController::class,'addJenisPembelian'])->name('add.jenis.pembelian');
Route::post('/store-jenis-pembelian',[JenisPembelianController::class,'storeJenisPembelian'])->name('store.jenis.pembelian');
Route::get('/all-jenis-pembelian',[JenisPembelianController::class,'allJenisPembelian'])->name('all.jenis.pembelian');
Route::get('/edit-jenis-pembelian/{id}',[JenisPembelianController::class,'editJenisPembelian'])->name('edit.jenis.pembelian');
Route::put('/update-jenis-pembelian/{id}',[JenisPembelianController::class,'updateJenisPembelian'])->name('update.jenis.pembelian');
Route::get('/confirm-delete-jenis-pembelian/{id}',[JenisPembelianController::class,'confirmDeleteJenisPembelian'])->name('confirm.delete.jenis.pembelian');
Route::get('/delete-jenis-pembelian/{id}',[JenisPembelianController::class,'deleteJenisPembelian'])->name('delete.jenis.pembelian');
