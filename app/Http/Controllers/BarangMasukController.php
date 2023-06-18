<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class BarangMasukController extends Controller
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
    $barangmasuk = BarangMasuk::all();
    $data = [
        'barangmasuk' => $barangmasuk,
        'user' => auth()->user() // Mengirimkan instance pengguna saat ini ke view
    ];
    return view('barangmasuk.index', $data);
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
        $simpan->ukuran_masuk = $validasi['ukuran_masuk'];
        $simpan->jumlah_masuk = $validasi['jumlah_masuk'];
        $simpan->pengirim = $validasi['pengirim'];
        $simpan->save();

        
        return redirect('barangmasuk');
    }


    public function edit($id)
    {
        // $data['title'] = 'Kategori';
        // $kategori=DB::table('kategori')->where('id',$id)->get();
        $barangmasuk=BarangMasuk::findorfail($id);
        $kategori =  Kategori::all();
        return view('barangmasuk.edit')->with('kategori',$kategori)->with('barangmasuk',$barangmasuk);
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
        // $kategori = Kategori::find($id);
        $barangmasuk=BarangMasuk::findorfail($id);
        // dd($request);

        $validasi = $request->validate([
            'tgl_barang_masuk' => 'required',
            'kategori_id' => 'required',
            'nomor_barang_masuk' => 'required',
            'nama_barang_masuk' => 'required',
            'jenis_masuk' => 'required',
            'ukuran_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'pengirim' => 'required',
        ]);

        $barangmasuk->tgl_barang_masuk = $validasi['tgl_barang_masuk'];
        $barangmasuk->kategori_id = $validasi['kategori_id'];
        $barangmasuk->jenis_masuk = $validasi['jenis_masuk'];
        $barangmasuk->nomor_barang_masuk = $validasi['nomor_barang_masuk'];
        $barangmasuk->nama_barang_masuk = $validasi['nama_barang_masuk'];
        $barangmasuk->ukuran_masuk = $validasi['ukuran_masuk'];
        $barangmasuk->jumlah_masuk = $validasi['jumlah_masuk'];
        $barangmasuk->pengirim = $validasi['pengirim'];
        $barangmasuk->save();

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

