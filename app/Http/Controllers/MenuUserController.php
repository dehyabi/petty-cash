<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuUserController extends Controller
{
    public function menuUser() {
        return view('user.menu-user');

    }
}
