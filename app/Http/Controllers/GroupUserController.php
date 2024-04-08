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
}
