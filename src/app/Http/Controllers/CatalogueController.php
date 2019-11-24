<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    // Product catalogue view (laods all products in a view)
    public function index() {
        return view('admin.catalogue');
    }
}
