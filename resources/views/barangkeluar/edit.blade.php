@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Edit Data Barang</b>
    </div>
    <div class="card-body">
    <form action="{{ url('barangkeluar/update/' . $barangkeluar->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Keluar</label>
            <input type="date" class="form-control" id="tgl_barang_keluar" value="{{  old('tgl_barang_keluar')?? $barangkeluar->tgl_barang_keluar }}" placeholder=""
                name="tgl_barang_keluar" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Id Barang</label>
            <input type="text" class="form-control" id="nomor-keluar" value="{{  old('nomor_barang_keluar')?? $barangkeluar->nomor_barang_keluar }}"
                placeholder="" name="nomor_barang_keluar" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Barang</label>
            <input type="text" class="form-control" id="barang-keluar" value="{{  old('nama_barang_keluar')?? $barangkeluar->nama_barang_keluar }}" placeholder=""
                required name="nama_barang_keluar">
        </div>

        <div class="form-group">
                    <label for="exampleInputEmail">Jenis</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="{{ $barangkeluar->kategori_id }}" selected>{{ $barangkeluar->kategori->jenis }}</option>
                        @foreach ($kategori as $item)
                            @if ($item->id != $barangkeluar->kategori_id)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

        <div class="form-group">
            <label for="exampleInputtext1">Ukuran</label>
            <input type="text" class="form-control" id="ukuran-keluar" placeholder="" required name="ukuran_keluar" value="{{  old('ukuran_keluar')?? $barangkeluar->ukuran_keluar }}">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jumlah</label>
            <input type="text" class="form-control" id="jumlah-keluar" value="{{ old('jumlah_keluar')?? $barangkeluar->jumlah_keluar }}" placeholder=""
                required name="jumlah_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Penerima</label>
            <input type="text" class="form-control" id="penerima-keluar" value="{{ old('penerima')?? $barangkeluar->penerima}}"
                placeholder="" required name="penerima">
        </div>

        <div class="form-group">
            <label for="exampleInputtext1">Status</label>
            <select class="form-control" id="status-keluar" value="{{ old('status')?? $barangkeluar->status}}" placeholder="" required name="status">
                <option value="1">On Delivery</option>
                <option value="1">Arrive</option>
            </select>
        </div>


        <div class="form-group">
            <label for="exampleInputtext1">Keterangan</label>
            <input type="text" class="form-control" id="jenis-keluar" value="{{  old('jenis_keluar')?? $barangkeluar->jenis_keluar }}"
                placeholder="" required name="jenis_keluar">
        </div>

        
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-share square"></i> Submit</button>
        </div>
    </form>
</div>
</div>
@endsection
