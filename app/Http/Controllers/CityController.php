<?php

namespace App\Http\Controllers;

use App\Models\City;use Illuminate\Http\Request;


class CityController extends Controller
{
    public function addCity() {
        return view('city.add-city');

    }

    public function allCity() {
        $cities = City::all();
        return view('city.all-city', compact('cities'));
    }   

}
