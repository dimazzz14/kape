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
    public function index()
    {
        $barangkeluar = BarangKeluar::all();
        $data = compact('barangkeluar');
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

        $data['title'] = 'Barang Keluar';
        $barangkeluar = BarangKeluar::find($id);
        return view('barangkeluar.edit', ['barangkeluar' => $barangkeluar], $data);
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
        $data = $request->all();
        $barangkeluar = BarangKeluar::find($id);
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
        $barangkeluar->update([
            'tgl_barang_keluar' => $data['tgl_barang_keluar'],
            'kategori_id' => $data['kategori_id'],
            'nomor_barang_keluar' => $data['nomor_barang_keluar'],
            'nama_barang_keluar' => $data['nama_barang_keluar'],
            'jenis_keluar' => $data['jenis_keluar'],
            'ukuran_keluar' => $data['ukuran_keluar'],
            'jumlah_keluar' => $data['jumlah_keluar'],
            'penerima' => $data['penerima'],
            'status' => $data['status']
        ]);
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
