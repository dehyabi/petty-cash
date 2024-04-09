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

    public function storeArea(Request $request) {
        $area = new Area;
        $area->area=$request->area;

        if (is_null($area->area)) {
            return redirect()->route('add.area')->with([
                'error' => 'Silakan isi area',
                'area' => $area->area
            ]);
        }

        if (Area::where('area', $area->area)->exists()) {
            return redirect()->route('add.area')->with([
                'error' => $area->area . ' sudah ditambahkan',
            ]);
        }

        $area->save();
        
        return redirect()->route('all.area')->with([
            'success' => $area->area . ' berhasil ditambahkan'
        ]);
    }   

    public function editArea($id) {

        $area = Area::findOrfail($id);
        return view('area.edit-area', compact('area'));
    }


    public function updateArea(Request $request, $id) {
        $this->validate($request, [
            'area' => 'required'
        ]);

        $area = Area::findOrFail($id);       

        $area->update([
            'area' => $request->area
        ]);

        if ($area) {
            return redirect()
                ->route('all.area')
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

    public function confirmDeleteArea($id) {

        $area = Area::findOrfail($id);
        return view('area.confirm-delete-area', compact('area'));
    }

    public function deleteArea($id) {
        $area = Area::findOrFail($id);
        $area->delete();

        if ($area) {
            return redirect()
                ->route('all.area')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.area')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }
}
