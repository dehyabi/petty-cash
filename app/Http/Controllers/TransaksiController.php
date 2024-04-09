<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\JenisPembelian;
use App\Models\PettyCash;
use App\Models\User;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function addTransaksi() {
        $outlets = Outlet::all();
        $jenis_pembelians = JenisPembelian::all();
        $petty_cashes = PettyCash::all();
        $users = User::all();
        return view('transaksi.add-transaksi', compact('outlets', 'jenis_pembelians', 'petty_cashes', 'users'));

    }

    public function allTransaksi() {

        $allTransaksi = Transaksi::join('outlets', 'outlets.id', '=', 'transaksis.outlet')
        ->join('jenis_pembelians', 'jenis_pembelians.id', '=', 'transaksis.jenis_pembelian')
        ->join('petty_cashes', 'petty_cashes.id', '=', 'transaksis.akun')
        ->join('users', 'users.id', '=', 'transaksis.user')
        ->get(['transaksis.*', 'outlets.outlet', 'jenis_pembelians.jenis_pembelian', 'petty_cashes.akun', 'users.nama']);
        

        return view('transaksi.all-transaksi', compact('allTransaksi'));

    }

    public function storeTransaksi(Request $request) {
        $transaksi = new Transaksi;
        $transaksi->outlet=$request->outlet;
        $transaksi->jenis_pembelian=$request->jenis_pembelian;
        $transaksi->akun=$request->akun;
        $transaksi->user=$request->user;
        $transaksi->debit=$request->debit;
        $transaksi->kredit=$request->kredit;

        if (is_null($transaksi->outlet || $transaksi->jenis_pembelian || $transaksi->akun || $transaksi->user || $transaksi->debit || $transaksi->kredit)) {
            return redirect()->route('add.transaksi')->with([
                'error' => 'Silakan lengkapi semua data'
            ]);
        }

        $transaksi->save();
        
        return redirect()->route('all.transaksi')->with([
            'success' => 'Transaksi petty cash berhasil ditambahkan'
        ]);
    }
}
