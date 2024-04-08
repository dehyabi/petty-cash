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
}
