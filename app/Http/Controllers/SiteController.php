<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function addSite() {
        return view('site.add-site');

    }

    public function allSite() {
        $sites = Site::all();
        return view('site.all-site', compact('sites'));
    }  


    public function storeSite(Request $request) {
        $site = new Site;
        $site->site=$request->site;

        if (is_null($site->site)) {
            return redirect()->route('add.site')->with([
                'error' => 'Silakan isi site',
                'site' => $site->site
            ]);
        }

        if (Site::where('site', $site->site)->exists()) {
            return redirect()->route('add.site')->with([
                'error' => $site->site . ' sudah ditambahkan',
            ]);
        }

        $site->save();
        
        return redirect()->route('all.site')->with([
            'success' => $site->site . ' berhasil ditambahkan'
        ]);
    }

    public function editSite($id) {

        $site = Site::findOrfail($id);
        return view('site.edit-site', compact('site'));
    }


    public function updateSite(Request $request, $id) {
        $this->validate($request, [
            'site' => 'required'
        ]);

        $site = Site::findOrFail($id);       

        $site->update([
            'site' => $request->site
        ]);

        if ($site) {
            return redirect()
                ->route('all.site')
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

    public function confirmDeleteSite($id) {

        $site = Site::findOrfail($id);
        return view('site.confirm-delete-site', compact('site'));
    }

    public function deletesite($id) {
        $site = Site::findOrFail($id);
        $site->delete();

        if ($site) {
            return redirect()
                ->route('all.site')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.site')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }
}
