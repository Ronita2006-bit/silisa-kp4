<?php

namespace App\Http\Controllers;

use App\Support\StokSimulasi;

class ManajerStokController extends Controller
{
    public function index()
    {
        // DATA SIMULASI. Nanti diganti query database (lewat StokSimulasi).
        $stok = StokSimulasi::semua();

        return view('manajer.stok', compact('stok'));
    }
}
