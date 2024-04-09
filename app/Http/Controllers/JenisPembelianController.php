<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembelian;

class JenisPembelianController extends Controller
{
    public function addJenisPembelian() {
        return view('jenis-pembelian.add-jenis-pembelian');

    }

    public function allJenisPembelian() {
        $jenis_pembelians = JenisPembelian::all();
        return view('jenis-pembelian.all-jenis-pembelian', compact('jenis_pembelians'));
    }  

    public function storeJenisPembelian(Request $request) {
        $jenis_pembelian = new JenisPembelian;
        $jenis_pembelian->jenis_pembelian=$request->jenis_pembelian;

        if (is_null($jenis_pembelian->jenis_pembelian)) {
            return redirect()->route('add.jenis.pembelian')->with([
                'error' => 'Silakan isi jenis pembelian',
                'jenis_pembelian' => $jenis_pembelian->jenis_pembelian
            ]);
        }

        if (JenisPembelian::where('jenis_pembelian', $jenis_pembelian->jenis_pembelian)->exists()) {
            return redirect()->route('add.jenis.pembelian')->with([
                'error' => $jenis_pembelian->jenis_pembelian . ' sudah ditambahkan',
            ]);
        }

        $jenis_pembelian->save();
        
        return redirect()->route('all.jenis.pembelian')->with([
            'success' => $jenis_pembelian->jenis_pembelian . ' berhasil ditambahkan'
        ]);
    }

    public function editJenisPembelian($id) {
        $jenis_pembelian = JenisPembelian::findOrfail($id);
        return view('jenis-pembelian.edit-jenis-pembelian', compact('jenis_pembelian'));
    }

    public function updateJenisPembelian(Request $request, $id) {
        $this->validate($request, [
            'jenis_pembelian' => 'required'
        ]);

        $jenis_pembelian = JenisPembelian::findOrFail($id);       

        $jenis_pembelian->update([
            'jenis_pembelian' => $request->jenis_pembelian
        ]);

        if ($jenis_pembelian) {
            return redirect()
                ->route('all.jenis.pembelian')
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

    public function confirmDeleteJenisPembelian($id) {

        $jenis_pembelian = JenisPembelian::findOrfail($id);
        return view('jenis-pembelian.confirm-delete-jenis-pembelian', compact('jenis_pembelian'));
    }

    public function deleteJenisPembelian($id) {
        $jenis_pembelian = JenisPembelian::findOrFail($id);
        $jenis_pembelian->delete();

        if ($jenis_pembelian) {
            return redirect()
                ->route('all.jenis.pembelian')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.jenis.pembelian')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}
