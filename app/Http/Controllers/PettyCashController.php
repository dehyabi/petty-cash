<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PettyCash;

class PettyCashController extends Controller
{
    public function addPettyCash() {
        return view('petty-cash.add-petty-cash');

    }

    public function allPettyCash() {
        $petty_cash = PettyCash::all();
        return view('petty-cash.all-petty-cash', compact('petty_cash'));
    }  
}
