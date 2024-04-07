<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuTransaksiController extends Controller
{
    public function menuTransaksi() {
        return view('transaksi.menu-transaksi');

    }
}
