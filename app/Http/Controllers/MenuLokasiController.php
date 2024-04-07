<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuLokasiController extends Controller
{
    public function menuLokasi() {
        return view('lokasi.menu-lokasi');

    }

}
