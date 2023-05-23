<?php

namespace App\Http\Controllers;
use App\Models\Stok;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        $data = compact('stok');
        return view('stok.index',$data);
    }
}
