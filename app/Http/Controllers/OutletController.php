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


    public function editOutlet($id) {
        $sites = Site::all();
        $areas = Area::all();
        $cities = City::all();

        $outlet = Outlet::findOrfail($id);

        return view('outlet.edit-outlet', compact('outlet', 'sites', 'areas', 'cities'));
    }

    public function updateOutlet(Request $request, $id) {
        $this->validate($request, [
            'outlet' => 'required'
        ]);

        $outlet = Outlet::findOrFail($id);       

        $outlet->update([
            'outlet' => $request->outlet,
            'site' => $request->site,
            'area' => $request->area,
            'kota' => $request->kota
        ]);

        if ($outlet) {
            return redirect()
                ->route('all.outlet')
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

    public function confirmDeleteOutlet($id) {

        $outlet = Outlet::findOrfail($id);
        return view('outlet.confirm-delete-outlet', compact('outlet'));
    }

    public function deleteOutlet($id) {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();

        if ($outlet) {
            return redirect()
                ->route('all.outlet')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.outlet')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}
