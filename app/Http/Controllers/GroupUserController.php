<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    public function addGroupUser() {
        return view('user-group.add-user-group');

    }
}
