<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuDashboardController extends Controller
{
    public function menuDashboard() {
        return view('dashboard.menu-dashboard');

    }
}
