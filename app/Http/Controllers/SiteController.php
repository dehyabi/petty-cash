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

        if (site::where('site', $site->site)->exists()) {
            return redirect()->route('add.site')->with([
                'error' => $site->site . ' sudah ditambahkan',
            ]);
        }

        $site->save();
        
        return redirect()->route('all.site')->with([
            'success' => $site->site . ' berhasil ditambahkan'
        ]);
    }
}
