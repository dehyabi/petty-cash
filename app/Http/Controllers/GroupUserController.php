<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupUser;

class GroupUserController extends Controller
{
    public function addGroupUser() {
        return view('group-user.add-group-user');

    }

    public function allGroupUser() {
        $group_users = GroupUser::all();
        return view('group-user.all-group-user', compact('group_users'));
    }  

    public function storeGroupUser(Request $request) {
        $group_user = new GroupUser;
        $group_user->group_user=$request->group_user;

        if (is_null($group_user->group_user)) {
            return redirect()->route('add.group.user')->with([
                'error' => 'Silakan isi group user',
                'group_user' => $group_user->group_user
            ]);
        }

        if (GroupUser::where('group_user', $group_user->group_user)->exists()) {
            return redirect()->route('add.group.user')->with([
                'error' => $group_user->group_user . ' sudah ditambahkan',
            ]);
        }

        $group_user->save();
        
        return redirect()->route('all.group.user')->with([
            'success' => $group_user->group_user . ' berhasil ditambahkan'
        ]);
    }


    public function editGroupUser($id) {

        $group_user = GroupUser::findOrfail($id);
        return view('group-user.edit-group-user', compact('group_user'));
    }


    public function updateGroupUser(Request $request, $id) {
        $this->validate($request, [
            'group_user' => 'required'
        ]);

        $group_user = GroupUser::findOrFail($id);       

        $group_user->update([
            'group_user' => $request->group_user
        ]);

        if ($group_user) {
            return redirect()
                ->route('all.group.user')
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

    public function confirmDeleteGroupUser($id) {

        $group_user = GroupUser::findOrfail($id);
        return view('group-user.confirm-delete-group-user', compact('group_user'));
    }

    public function deleteGroupUser($id) {
        $group_user = GroupUser::findOrFail($id);
        $group_user->delete();

        if ($group_user) {
            return redirect()
                ->route('all.group.user')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.group.user')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }
}
