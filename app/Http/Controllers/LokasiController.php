<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function addLokasi() {
        return view('lokasi.add-lokasi');

    }

}
