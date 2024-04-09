<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PettyCash;
use App\Models\GroupPettyCash;

class PettyCashController extends Controller
{
    public function addPettyCash() {
        $group_petty_cashes = GroupPettyCash::all();
        return view('petty-cash.add-petty-cash', compact('group_petty_cashes'));

    }

    public function allPettyCash() {
        // $petty_cashes = PettyCash::all();

        $petty_cashes = PettyCash::join('group_petty_cashes', 'group_petty_cashes.id', '=', 'petty_cashes.group')
        ->get(['petty_cashes.*', 'group_petty_cashes.group_petty_cash']);

        return view('petty-cash.all-petty-cash', compact('petty_cashes'));
    }  

    public function storePettyCash(Request $request) {
        $petty_cash = new PettyCash;
        $petty_cash->nomor_akun=$request->nomor_akun;
        $petty_cash->akun=$request->akun;
        $petty_cash->group=$request->group;

        if (is_null($petty_cash->akun)) {
            return redirect()->route('add.petty.cash')->with([
                'error' => 'Silakan isi akun petty cash',
                'akun' => $petty_cash->akun
            ]);
        }

        if (PettyCash::where('nomor_akun', $petty_cash->nomor_akun)->exists()) {
            return redirect()->route('add.petty.cash')->with([
                'error' => $petty_cash->nomor_akun . ' sudah ditambahkan',
            ]);
        }

        if (PettyCash::where('akun', $petty_cash->akun)->exists()) {
            return redirect()->route('add.petty.cash')->with([
                'error' => $petty_cash->akun . ' sudah ditambahkan',
            ]);
        }

        $petty_cash->save();
        
        return redirect()->route('all.petty.cash')->with([
            'success' => $petty_cash->akun . ' berhasil ditambahkan'
        ]);
    }
}
