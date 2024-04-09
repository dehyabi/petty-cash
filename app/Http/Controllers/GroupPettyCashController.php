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


    public function editGroupPettyCash($id) {

        $group_petty_cash = GroupPettyCash::findOrfail($id);
        return view('group-petty-cash.edit-group-petty-cash', compact('group_petty_cash'));
    }


    public function updateGroupPettyCash(Request $request, $id) {
        $this->validate($request, [
            'group_petty_cash' => 'required'
        ]);

        $group_petty_cash = GroupPettyCash::findOrFail($id);       

        $group_petty_cash->update([
            'group_petty_cash' => $request->group_petty_cash
        ]);

        if ($group_petty_cash) {
            return redirect()
                ->route('all.group.petty.cash')
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

    public function confirmDeleteGroupPettyCash($id) {

        $group_petty_cash = GroupPettyCash::findOrfail($id);
        return view('group-petty-cash.confirm-delete-group-petty-cash', compact('group_petty_cash'));
    }

    public function deleteGroupPettyCash($id) {
        $group_petty_cash = GroupPettyCash::findOrFail($id);
        $group_petty_cash->delete();

        if ($group_petty_cash) {
            return redirect()
                ->route('all.group.petty.cash')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.group.petty.cash')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }
}
