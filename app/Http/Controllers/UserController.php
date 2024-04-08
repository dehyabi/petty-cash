<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;

class UserController extends Controller
{
    public function addUser() {
        $group_users = GroupUser::all();
        return view('user.add-user', compact('group_users'));

    }

    public function allUser() {
        // $users = User::all();

        $users = User::join('group_users', 'group_users.id', '=', 'users.group_user')
        ->get(['users.*', 'group_users.group_user']);

        return view('user.all-user', compact('users'));
    } 

    public function storeUser(Request $request) {
        $user = new User;
        $user->nama=$request->nama;
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

}
