<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function daftarOutlet() {
        return view('outlet.daftar-outlet');

    }
}
