<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function addArea() {
        return view('area.add-area');

    }

    public function allArea() {
        $areas = area::all();
        return view('area.all-area', compact('areas'));
    }   
}
