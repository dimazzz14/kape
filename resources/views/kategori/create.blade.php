@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <label for="exampleInputEmail1">Input Kategori</label>
    </div>
    <div class="card-body px-5 py-3">
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Id Barang</label>
            <input type="text" class="form-control" id="nomor-kategori" placeholder="" name="nomor_kategori" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" class="form-control" id="nama-kategori" placeholder="" required name="nama_kategori">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jenis</label>
            <input type="text" class="form-control" id="jenis" placeholder="" required name="jenis">
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </form>
</div>
</div>

@endsection
