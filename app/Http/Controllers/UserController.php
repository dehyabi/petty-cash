<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Outlet;

class UserController extends Controller
{
    public function addUser() {
        $group_users = GroupUser::all();
        $outlets = Outlet::all();
        return view('user.add-user', compact('group_users', 'outlets'));

    }

    public function allUser() {
        $users = User::join('group_users', 'group_users.id', '=', 'users.group_user')
        ->join('outlets', 'outlets.id', '=', 'users.outlet')
        ->get(['users.*', 'group_users.group_user', 'outlets.outlet']);

        return view('user.all-user', compact('users'));
    } 

    public function storeUser(Request $request) {
        $user = new User;
        $user->nama=$request->nama;
        $user->outlet=$request->outlet;
        $user->group_user=$request->group_user;

        if (is_null($user->nama)) {
            return redirect()->route('add.user')->with([
                'error' => 'Silakan isi user',
                'nama' => $user->nama
            ]);
        }

        if (User::where('nama', $user->nama)->exists()) {
            return redirect()->route('add.user')->with([
                'error' => $user->nama . ' sudah ditambahkan',
            ]);
        }

        $user->save();
        
        return redirect()->route('all.user')->with([
            'success' => $user->nama . ' berhasil ditambahkan'
        ]);
    }


    public function editUser($id) {

        $group_users = GroupUser::all();
        $outlets = Outlet::all();

        $user = User::findOrfail($id);
        return view('user.edit-user', compact('user', 'group_users', 'outlets'));
    }


    public function updateUser(Request $request, $id) {
        $this->validate($request, [
            'user' => 'required'
        ]);

        $user = User::findOrFail($id);       

        $user->update([
            'nama' => $request->user,
            'outlet' => $request->outlet,
            'group_user' => $request->group_user
        ]);

        if ($user) {
            return redirect()
                ->route('all.user')
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

    public function confirmDeleteUser($id) {

        $user = User::findOrfail($id);
        return view('user.confirm-delete-user', compact('user'));
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('all.user')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.user')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}
