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

        if (is_null($city->kota)) {
            return redirect()->route('add.city')->with([
                'error' => 'Silakan isi kota',
                'kota' => $city->kota
            ]);
        }

        if (City::where('kota', $city->kota)->exists()) {
            return redirect()->route('add.city')->with([
                'error' => $city->kota . ' sudah ditambahkan',
            ]);
        }

        $city->save();
        
        return redirect()->route('all.city')->with([
            'success' => $city->kota . ' berhasil ditambahkan'
        ]);
    }


    public function editCity($id) {

        $city = City::findOrfail($id);
        return view('city.edit-city', compact('city'));
    }


    public function updateCity(Request $request, $id) {
        $this->validate($request, [
            'kota' => 'required'
        ]);

        $city = City::findOrFail($id);       

        $city->update([
            'kota' => $request->kota
        ]);

        if ($city) {
            return redirect()
                ->route('all.city')
                ->with([
                    'success' => 'Data berhasil diupdate'
                ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Terjadi kesalahan'
            ]);
        }
    }

    public function confirmDeleteCity($id) {

        $city = City::findOrfail($id);
        return view('city.confirm-delete-city', compact('city'));
    }

    public function deleteCity($id) {
        $city = City::findOrFail($id);
        $city->delete();

        if ($city) {
            return redirect()
                ->route('all.city')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.city')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}
