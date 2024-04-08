<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function addCity() {
        return view('city.add-city');

    }

    public function allCity() {
        $cities = City::all();
        return view('city.all-city', compact('cities'));
    }   

    public function storeCity(Request $request) {
        $city = new City;
        $city->kota=$request->kota;

        $city_name = $city->kota;

        if (is_null($city->kota)) {
            return redirect()->route('add.city')->with([
                'error' => 'Silakan isi kota',
                'kota' => $city->kota
            ]);
        }

        if (City::where('kota', $city->kota)->exists()) {
            return redirect()->route('add.city')->with([
                'error' => 'Kota ' . $city->kota . ' sudah ditambahkan',
            ]);
        }

        $city->save();
        
        return redirect()->route('all.city')->with([
            'success' => 'Kota '. $city_name . ' berhasil ditambahkan'
        ]);
    }


}
