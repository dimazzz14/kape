<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\BarangMasuk;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::all();
        $data = compact('barangmasuk');
        return view('stok.index',$data);
    }
}
