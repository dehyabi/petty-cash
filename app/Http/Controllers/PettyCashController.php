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


    public function editPettyCash($id) {
        $group_petty_cashes = GroupPettyCash::all();
        $petty_cash = PettyCash::findOrfail($id);
        return view('petty-cash.edit-petty-cash', compact('petty_cash', 'group_petty_cashes'));
    }


    public function updatePettyCash(Request $request, $id) {
        $this->validate($request, [
            'nomor_akun' => 'required',
            'akun' => 'required'
        ]);

        $petty_cash = PettyCash::findOrFail($id);       

        $petty_cash->update([
            'nomor_akun' => $request->nomor_akun,
            'akun' => $request->akun,
            'group' => $request->group
        ]);

        if ($petty_cash) {
            return redirect()
                ->route('all.petty.cash')
                ->with([
                    'success' => 'Data berhasil diupdate'
                ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Terjadi kesalahan'
            ]);
        }
    }

    public function confirmDeletePettyCash($id) {

        $petty_cash = PettyCash::findOrfail($id);
        return view('petty-cash.confirm-delete-petty-cash', compact('petty_cash'));
    }

    public function deletePettyCash($id) {
        $petty_cash = PettyCash::findOrFail($id);
        $petty_cash->delete();

        if ($petty_cash) {
            return redirect()
                ->route('all.petty.cash')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.petty.cash')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}
