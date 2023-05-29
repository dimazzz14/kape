<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $data = compact('kategori');
        return view('kategori.index',$data);
    }

    public function create()
    {
        $data['title'] = 'Kategori';
        return view('kategori.create', $data);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nomor_kategori' => 'required',
            'nama_kategori' => 'required',
            'jenis' => 'required'
        ]);

        $simpan = new Kategori();
        $simpan->nomor_kategori = $validasi['nomor_kategori'];
        $simpan->nama_kategori = $validasi['nama_kategori'];
        $simpan->jenis = $validasi['jenis'];

        $simpan->save();
        return redirect('kategori');
    }

    public function edit($id)
    {

        $data['title'] = 'Kategori';
        $kategori = Kategori::find($id);
        return view('kategori.edit', ['kategori' => $kategori], $data);
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
        $kategori = Kategori::find($id);
        $data = $request->validate([
            'nomor_kategori' => 'required',
            'nama_kategori' => 'required',
            'jenis' => 'required'
        ]);
        $kategori->update([
            'nomor_kategori' => $data['nomor_kategori'],
            'nama_kategori' => $data['nama_kategori'],
            'jenis' => $data['jenis']
        ]);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
