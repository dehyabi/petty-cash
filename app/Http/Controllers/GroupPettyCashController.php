<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupPettyCashController extends Controller
{
    public function addGroupPettyCash() {
        return view('petty-cash-group.add-petty-cash-group');

    }
}
