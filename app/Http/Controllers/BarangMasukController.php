<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;



class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = BarangMasuk::all();
        $data = compact('barangmasuk');
        return view('barangmasuk.index',$data);
    }

    public function create()
    {
        $kategori=Kategori::all();
        $data['title'] = 'Barang Masuk';
        return view('barangmasuk.create')->with('kategori',$kategori);
    }



    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tgl_barang_masuk' => 'required',
            'kategori_id' => 'required',
            'nomor_barang_masuk'=>'required',
            'nama_barang_masuk'=>'required',
            'jenis_masuk'=>'required',
            // 'kategori_nama' => 'required',
            // 'kategori_jenis' => 'required',
            'ukuran_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'pengirim' => 'required',
        ]);

        $simpan = new BarangMasuk();
        $simpan->tgl_barang_masuk = $validasi['tgl_barang_masuk'];
        $simpan->kategori_id = $validasi['kategori_id'];
        $simpan->jenis_masuk = $validasi['jenis_masuk'];
        $simpan->nomor_barang_masuk =$validasi['nomor_barang_masuk'];
        $simpan->nama_barang_masuk =$validasi['nama_barang_masuk'];
        // $simpan->nama_kategori = $validasi['kategori_nama'];
        // $simpan->jenis = $validasi['kategori_jenis'];
        $simpan->ukuran_masuk = $validasi['ukuran_masuk'];
        $simpan->jumlah_masuk = $validasi['jumlah_masuk'];
        $simpan->pengirim = $validasi['pengirim'];
        $simpan->save();
        // return $request;
        return redirect('barangmasuk');
    }


    public function edit($id)
    {

        $data['title'] = 'Barang Masuk';
        $barangmasuk = BarangMasuk::find($id);
        return view('barangmasuk.edit', ['barangmasuk' => $barangmasuk], $data);
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
        $barangmasuk = BarangMasuk::find($id);
        $data = $request->validate([
            'tgl_barang_masuk' => 'required',
            'nomor_barang_masuk' => 'required',
            'nama_barang_masuk' => 'required',
            'jenis_masuk' => 'required',
            'ukuran_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'pengirim' => 'required'
        ]);
        $barangmasuk->update([
            'tgl_barang_masuk' => $data['tgl_barang_masuk'],
            'nomor_barang_masuk' => $data['nomor_barang_masuk'],
            'nama_barang_masuk' => $data['nama_barang_masuk'],
            'jenis_masuk' => $data['jenis_masuk'],
            'ukuran_masuk' => $data['ukuran_masuk'],
            'jumlah_masuk' => $data['jumlah_masuk'],
            'pengirim' => $data['pengirim']
        ]);
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index');
    }

   
}   

