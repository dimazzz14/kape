<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class PesananController extends Controller
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
        $pesanan = Pesanan::all();
        $data = ['pesanan'=>$pesanan, 'user' => auth()->user() ];
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
            'kategori_id' => 'required',
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
        $simpan->kategori_id = $validasi['kategori_id'];
        $simpan->nomor_barang = $validasi['nomor_barang'];
        $simpan->jenis = $validasi['jenis'];
        $simpan->ukuran = $validasi['ukuran'];
        $simpan->jumlah = $validasi['jumlah'];

        $simpan->save();
        return redirect('pesanan');
    }

    public function edit($id)
    {

        // $data['title'] = 'Pesanan';
        $pesanan = Pesanan::findorfail($id);
        $kategori = Kategori::all();
        return view('pesanan.edit')->with('kategori',$kategori)->with('pesanan',$pesanan);
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
        $pesanan = Pesanan::findorfail($id);
        $data = $request->validate([
            'tgl_pesanan' => 'required',
            'kategori_id' => 'required',
            'nomor_pesanan' => 'required',
            'nama_pemesan' => 'required',
            'nomor_barang' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required'
        ]);
        $pesanan->tgl_pesanan= $data['tgl_pesanan'];
        $pesanan->kategori_id = $data['kategori_id'];
        $pesanan->jenis = $data['jenis'];
        $pesanan->nomor_pesanan= $data['nomor_pesanan'];
        $pesanan->nama_pemesan = $data['nama_pemesan'];
        $pesanan->nomor_barang= $data['nomor_barang'];
        $pesanan->nama_barang = $data['nama_barang'];
        $pesanan->ukuran = $data['ukuran'];
        $pesanan->jumlah = $data['jumlah'];
        $pesanan->save();
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
