<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuPettyCashController extends Controller
{
    public function menuPettyCash() {
        return view('petty-cash.menu-petty-cash');

    }
}
