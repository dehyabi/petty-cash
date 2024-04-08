<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterLokasiController extends Controller
{
    public function masterLokasi() {
        return view('lokasi.master-lokasi');

    }
}
