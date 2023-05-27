@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <label for="exampleInputEmail1">Input Data Barang Masuk</label>
    </div>
    <div class="card-body px-5 py-3">
        <form action="{{ route('barangmasuk.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal-masuk" placeholder="" name="tgl_barang_masuk" required >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Id Barang</label>
                <input type="text" class="form-control" id="nomor-masuk" placeholder="" required name="nomor_barang_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Nama Barang</label>
                <input type="text" class="form-control" id="barang-masuk" placeholder="" required name="nama_barang_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Jenis</label>
                <input type="text" class="form-control" id="jenis-masuk" placeholder="" required name="jenis_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Ukuran</label>
                <input type="text" class="form-control" id="ukuran-masuk" placeholder="" required name="ukuran_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Jumlah</label>
                <input type="integer" class="form-control" id="jumlah-masuk" placeholder="" required name="jumlah_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Pengirim</label>
                <input type="text" class="form-control" id="pengirim-masuk" placeholder="" required name="pengirim">
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"  style="width: 100px">Tambah</button>
            </div>
        </form>

    </div>

</div>
@endsection
