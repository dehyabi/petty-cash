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
        $jenis_pembelian = JenisPembelian::all();
        return view('jenis-pembelian.all-jenis-pembelian', compact('jenis_pembelian'));
    }  
}
