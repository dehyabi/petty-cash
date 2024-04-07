<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuLaporanController extends Controller
{
    public function menuLaporan() {
        return view('laporan.menu-laporan');

    }
}
