@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <label for="exampleInputEmail1">Input Data Pesanan</label>
    </div>
    <div class="card-body px-5 py-3">
    <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Tanggal Pemesanan</label>
            <input type="date" class="form-control" id="tanggal-pesanan" placeholder="" name="tgl_pesanan" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Id Pesanan</label>
            <input type="text" class="form-control" id="nomor-pesanan" placeholder="" required name="nomor_pesanan">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama-pemesan" placeholder="" required name="nama_pemesan">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Id Barang</label>
            <input type="text" class="form-control" id="nomor-barang" placeholder="" required name="nomor_barang">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Barang</label>
            <input type="text" class="form-control" id="nama-barang" placeholder="" required name="nama_barang">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jenis</label>
            <input type="text" class="form-control" id="jenis" placeholder="" required name="jenis">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Ukuran</label>
            <input type="text" class="form-control" id="ukuran" placeholder="" required name="ukuran">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" placeholder="" required name="jumlah">
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </form>
</div>
</div>

@endsection
