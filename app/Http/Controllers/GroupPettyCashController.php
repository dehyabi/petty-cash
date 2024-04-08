<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupPettyCash;

class GroupPettyCashController extends Controller
{
    public function addGroupPettyCash() {
        return view('group-petty-cash.add-group-petty-cash');

    }

    public function allGroupPettyCash() {
        $group_petty_cash = GroupPettyCash::all();
        return view('group-petty-cash.all-group-petty-cash', compact('group_petty_cash'));
    } 
}
