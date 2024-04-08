<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    public function masterUser() {
        return view('user.master-user');

    }
}
