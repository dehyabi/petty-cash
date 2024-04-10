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
        $transaksis = Transaksi::all();
        $jenis_pembelians = JenisPembelian::all();
        $petty_cashes = PettyCash::all();
        $users = User::all();
        $outlets = Outlet::all();
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

        function generateRandomString($length = 10) {
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        }

        $transaksi = new Transaksi;
        $transaksi->no_transaksi=generateRandomString();
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


    public function editTransaksi($id) {
        $jenis_pembelians = JenisPembelian::all();
        $petty_cashes = PettyCash::all();
        $users = User::all();
        $outlets = Outlet::all();

        $transaksi = Transaksi::findOrfail($id);

        return view('transaksi.edit-transaksi', compact('jenis_pembelians', 'petty_cashes', 'users', 'transaksi', 'outlets'));
    }


    public function updateTransaksi(Request $request, $id) {
        $this->validate($request, [
            'outlet' => 'required'
        ]);

        $transaksi = Transaksi::findOrFail($id);    

        $transaksi->update([
            'outlet' => $request->outlet,
            'jenis_pembelian' => $request->jenis_pembelian,
            'akun' => $request->akun,
            'user' => $request->user,
            'debit' => $request->debit,
            'kredit' => $request->kredit
        ]);

        if ($transaksi) {
            return redirect()
                ->route('all.transaksi')
                ->with([
                    'success' => 'Data berhasil diupdate'
                ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Terjadi kesalahan'
            ]);
        }
    }

    public function confirmDeleteTransaksi($id) {

        $transaksi = Transaksi::findOrfail($id);
        return view('transaksi.confirm-delete-transaksi', compact('transaksi'));
    }

    public function deleteTransaksi($id) {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        if ($transaksi) {
            return redirect()
                ->route('all.transaksi')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.transaksi')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }
}
 