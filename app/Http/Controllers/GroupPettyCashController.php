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
        $group_petty_cashes = GroupPettyCash::all();
        return view('group-petty-cash.all-group-petty-cash', compact('group_petty_cashes'));
    } 


    public function storeGroupPettyCash(Request $request) {
        $group_petty_cash = new GroupPettyCash;
        $group_petty_cash->group_petty_cash=$request->group_petty_cash;

        if (is_null($group_petty_cash->group_petty_cash)) {
            return redirect()->route('add.group.petty.cash')->with([
                'error' => 'Silakan isi group petty cash',
                'group_petty_cash' => $group_petty_cash->group_petty_cash
            ]);
        }

        if (GroupPettyCash::where('group_petty_cash', $group_petty_cash->group_petty_cash)->exists()) {
            return redirect()->route('add.group.petty.cash')->with([
                'error' => $group_petty_cash->group_petty_cash . ' sudah ditambahkan',
            ]);
        }

        $group_petty_cash->save();
        
        return redirect()->route('all.group.petty.cash')->with([
            'success' => $group_petty_cash->group_petty_cash . ' berhasil ditambahkan'
        ]);
    }
}
