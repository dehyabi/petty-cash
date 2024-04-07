<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PettyCashController extends Controller
{
    public function addPettyCash() {
        return view('petty-cash.add-petty-cash');

    }
}
