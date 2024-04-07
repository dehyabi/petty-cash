<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function addSite() {
        return view('site.add-site');

    }
}
