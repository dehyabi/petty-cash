<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Site;    
use App\Models\Area;
use App\Models\City;

class OutletController extends Controller
{
    public function addOutlet() {
        $sites = Site::all();
        $areas = Area::all();
        $cities = City::all();
        return view('outlet.add-outlet', compact('sites','areas','cities'));

    }

    public function allOutlet() {

        $outlets = Outlet::join('sites', 'sites.id', '=', 'outlets.site')
        ->join('areas', 'areas.id', '=', 'outlets.area')
        ->join('cities', 'cities.id', '=', 'outlets.kota')
        ->get(['outlets.*', 'sites.site', 'areas.area', 'cities.kota']);

        return view('outlet.all-outlet', compact('outlets'));
    }  

    public function storeOutlet(Request $request) {
        $outlet = new Outlet;
        $outlet->outlet=$request->outlet;
        $outlet->site=$request->site;
        $outlet->area=$request->area;
        $outlet->kota=$request->kota;

        if (is_null($outlet->outlet)) {
            return redirect()->route('add.outlet')->with([
                'error' => 'Silakan isi outlet',
                'outlet' => $outlet->outlet
            ]);
        }

        if (Outlet::where('outlet', $outlet->outlet)->exists()) {
            return redirect()->route('add.outlet')->with([
                'error' => $outlet->outlet . ' sudah ditambahkan',
            ]);
        }

        $outlet->save();
        
        return redirect()->route('all.outlet')->with([
            'success' => $outlet->outlet . ' berhasil ditambahkan'
        ]);
    }
}
