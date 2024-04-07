<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuJenisPembelianController extends Controller
{
    public function menuJenisPembelian() {
        return view('jenis-pembelian.menu-jenis-pembelian');

    }
}
