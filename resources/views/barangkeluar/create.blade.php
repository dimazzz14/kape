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
            <label for="exampleInputtext1">Id Barang</label>
            <input type="text" class="form-control" id="barang-keluar" placeholder="" required name="nomor_barang_keluar">
        </div>

        <div class="form-group">
            <label for="exampleInputtext1">Nama Barang</label>
            <input type="text" class="form-control" id="barang-keluar" placeholder="" required name="nama_barang_keluar">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Jenis</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                @foreach ($kategori as $item)
                    <option value="{{ $item->nama_kategori}}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
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
            <select class="form-control" id="status-keluar" placeholder="" required name="status">
                <option value="1">On Delivery</option>
                <option value="1">Arrive</option>
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </form>
</div>
</div>

@endsection
