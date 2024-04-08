<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUser() {
        return view('user.add-user');

    }

    public function allUser() {
        $users = User::all();
        return view('user.all-user', compact('users'));
    }  
}
