<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function addOutlet() {
        return view('outlet.add-outlet');

    }

    public function allOutlet() {
        $outlets = Outlet::all();
        return view('outlet.all-outlet', compact('outlets'));
    }  
}
