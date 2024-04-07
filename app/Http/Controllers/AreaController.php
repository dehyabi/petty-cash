<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function addArea() {
        return view('area.add-area');

    }
}
