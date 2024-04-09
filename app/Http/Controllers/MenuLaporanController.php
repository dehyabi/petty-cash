<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\JenisPembelian;
use App\Models\PettyCash;
use App\Models\User;
use App\Models\Transaksi;

class MenuLaporanController extends Controller
{
    public function menuLaporan() {

        $allTransaksi = Transaksi::join('outlets', 'outlets.id', '=', 'transaksis.outlet')
        ->join('jenis_pembelians', 'jenis_pembelians.id', '=', 'transaksis.jenis_pembelian')
        ->join('petty_cashes', 'petty_cashes.id', '=', 'transaksis.akun')
        ->join('users', 'users.id', '=', 'transaksis.user')
        ->get(['transaksis.*', 'outlets.outlet', 'jenis_pembelians.jenis_pembelian', 'petty_cashes.akun', 'users.nama']);

        $totalKredit = Transaksi::sum('transaksis.kredit');
        $totalDebit = Transaksi::sum('transaksis.debit');
        
        return view('laporan.menu-laporan', compact('allTransaksi', 'totalDebit', 'totalKredit'));

    }
}
