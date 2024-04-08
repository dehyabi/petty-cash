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
}
