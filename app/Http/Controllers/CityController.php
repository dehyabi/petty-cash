<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addCity() {
        return view('city.add-city');

    }
}
