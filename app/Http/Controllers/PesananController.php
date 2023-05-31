<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;

use App\Models\Kategori;
use Illuminate\Http\Request;

class PesananController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        $data = compact('pesanan');
        return view('pesanan.index',$data);
    }

    public function create()
    {
        $kategori=Kategori::all();
        $data['title'] = 'Pesanan';
        return view('pesanan.create')->with('kategori',$kategori);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tgl_pesanan' => 'required',
            'nomor_pesanan' => 'required',
            'nama_pemesan' => 'required',
            'nomor_barang' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required'
        ]);

        $simpan = new Pesanan();
        $simpan->tgl_pesanan = $validasi['tgl_pesanan'];
        $simpan->nomor_pesanan = $validasi['nomor_pesanan'];
        $simpan->nama_pemesan = $validasi['nama_pemesan'];
        $simpan->nama_barang = $validasi['nama_barang'];
        $simpan->nomor_barang = $validasi['nomor_barang'];
        $simpan->jenis = $validasi['jenis'];
        $simpan->ukuran = $validasi['ukuran'];
        $simpan->jumlah = $validasi['jumlah'];

        $simpan->save();
        return redirect('pesanan');
    }

    public function edit($id)
    {

        $data['title'] = 'Pesanan';
        $pesanan = Pesanan::find($id);
        return view('pesanan.edit', ['pesanan' => $pesanan], $data);
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
        $pesanan = Pesanan::find($id);
        $data = $request->validate([
            'tgl_pesanan' => 'required',
            'nomor_pesanan' => 'required',
            'nama_pemesan' => 'required',
            'nomor_barang' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required'
        ]);
        $pesanan->update([
            'tgl_pesanan' => $data['tgl_pesanan'],
            'nomor_pesanan' => $data['nomor_pesanan'],
            'nama_pemesan' => $data['nama_pemesan'],
            'nomor_barang' => $data['nomor_barang'],
            'nama_barang' => $data['nama_barang'],
            'jenis' => $data['jenis'],
            'ukuran' => $data['ukuran'],
            'jumlah' => $data['jumlah']
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index');
    }

}
