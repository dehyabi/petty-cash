<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembelian;

class JenisPembelianController extends Controller
{
    public function addJenisPembelian() {
        return view('jenis-pembelian.add-jenis-pembelian');

    }

    public function allJenisPembelian() {
        $jenis_pembelians = JenisPembelian::all();
        return view('jenis-pembelian.all-jenis-pembelian', compact('jenis_pembelians'));
    }  

    public function storeJenisPembelian(Request $request) {
        $jenis_pembelian = new JenisPembelian;
        $jenis_pembelian->jenis_pembelian=$request->jenis_pembelian;

        if (is_null($jenis_pembelian->jenis_pembelian)) {
            return redirect()->route('add.jenis.pembelian')->with([
                'error' => 'Silakan isi jenis pembelian',
                'jenis_pembelian' => $jenis_pembelian->jenis_pembelian
            ]);
        }

        if (JenisPembelian::where('jenis_pembelian', $jenis_pembelian->jenis_pembelian)->exists()) {
            return redirect()->route('add.jenis_pembelian')->with([
                'error' => $jenis_pembelian->jenis_pembelian . ' sudah ditambahkan',
            ]);
        }

        $jenis_pembelian->save();
        
        return redirect()->route('all.jenis.pembelian')->with([
            'success' => $jenis_pembelian->jenis_pembelian . ' berhasil ditambahkan'
        ]);
    }
}
