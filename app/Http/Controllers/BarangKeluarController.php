<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $user;

     public function __construct()
     {
         $this->middleware(function ($request, $next) {
             $this->user = auth()->user();
             return $next($request);
         });
     }

    public function index()
    {
        $barangkeluar = BarangKeluar::all();
        $data = ['barangkeluar'=>$barangkeluar, 'user' => auth()->user()];
        return view('barangkeluar.index',$data);
    }

    public function create()
    {
        $kategori=Kategori::all();
        $data['title'] = 'Barang Keluar';
        return view('barangkeluar.create')->with('kategori',$kategori);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tgl_barang_keluar' => 'required',
            'kategori_id' => 'required',
            'nomor_barang_keluar' => 'required',
            'nama_barang_keluar' => 'required',
            'jenis_keluar' => 'required',
            'ukuran_keluar' => 'required',
            'jumlah_keluar' => 'required',
            'penerima' => 'required',
            'status' => 'required'
        ]);

        $simpan = new BarangKeluar();
        $simpan->tgl_barang_keluar = $validasi['tgl_barang_keluar'];
        $simpan->kategori_id = $validasi['kategori_id'];
        $simpan->nomor_barang_keluar = $validasi['nomor_barang_keluar'];
        $simpan->nama_barang_keluar = $validasi['nama_barang_keluar'];
        $simpan->jenis_keluar = $validasi['jenis_keluar'];
        $simpan->ukuran_keluar = $validasi['ukuran_keluar'];
        $simpan->jumlah_keluar = $validasi['jumlah_keluar'];
        $simpan->penerima = $validasi['penerima'];
        $simpan->status = $validasi['status'];

        $simpan->save();
        return redirect('barangkeluar');
    }

    public function edit($id)
    {
        // $data['title'] = 'Barang Keluar';
        $barangkeluar = BarangKeluar::findorfail($id);
        $kategori = Kategori::all();
        return view('barangkeluar.edit')->with('kategori',$kategori)->with('barangkeluar',$barangkeluar);
        // return view('barangkeluar.edit', ['barangkeluar' => $barangkeluar], $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        $barangkeluar = BarangKeluar::findorfail($id);
        $data = $request->validate([
            'tgl_barang_keluar' => 'required',
            'kategori_id' => 'required',
            'nomor_barang_keluar' => 'required',
            'nama_barang_keluar' => 'required',
            'jenis_keluar' => 'required',
            'ukuran_keluar' => 'required',
            'jumlah_keluar' => 'required',
            'penerima' => 'required',
            'status' => 'required'
        ]);
        $barangkeluar->tgl_barang_keluar = $data['tgl_barang_keluar'];
        $barangkeluar->kategori_id = $data['kategori_id'];
        $barangkeluar->jenis_keluar = $data['jenis_keluar'];
        $barangkeluar->nomor_barang_keluar = $data['nomor_barang_keluar'];
        $barangkeluar->nama_barang_keluar = $data['nama_barang_keluar'];
        $barangkeluar->ukuran_keluar = $data['ukuran_keluar'];
        $barangkeluar->jumlah_keluar = $data['jumlah_keluar'];
        $barangkeluar->penerima = $data['penerima'];
        $barangkeluar->status = $data['status'];
        $barangkeluar->save();
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::find($id);
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index');
    }

}
