@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <label for="exampleInputEmail1">Input Data Barang Keluar</label>
    </div>
    <div class="card-body px-5 py-3">
    <form action="{{ route('barangkeluar.store') }}" method="POST" enctype="multipart/form-data">
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
            <input type="date" class="form-control" id="tanggal-keluar" placeholder="" name="tgl_barang_keluar" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomor Barang</label>
            <input type="text" class="form-control" id="nomor-keluar" placeholder="" required name="nomor_barang_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Barang</label>
            <input type="text" class="form-control" id="barang-keluar" placeholder="" required name="nama_barang_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jenis</label>
            <input type="text" class="form-control" id="jenis-keluar" placeholder="" required name="jenis_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Ukuran</label>
            <input type="text" class="form-control" id="ukuran-keluar" placeholder="" required name="ukuran_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jumlah</label>
            <input type="text" class="form-control" id="jumlah-keluar" placeholder="" required name="jumlah_keluar">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Penerima</label>
            <input type="text" class="form-control" id="penerima-keluar" placeholder="" required name="penerima">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Status</label>
            <input type="text" class="form-control" id="status-keluar" placeholder="" required name="status">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </form>
</div>
</div>

@endsection
