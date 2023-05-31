@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Edit Data Pesanan</b>
    </div>
    <div class="card-body">
    <form action="{{ url('kategori/update/' . $kategori->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Id Barang</label>
            <input type="text" class="form-control" id="nomor-kategori" placeholder="" 
            name="nomor_kategori" 
            value="{{ old('nomor_kategori')?? $kategori->nomor_kategori }}">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" class="form-control" id="nama-kategori" placeholder="" name="nama_kategori"
            name="nama_kategori" 
            value="{{ old('nama_kategori')?? $kategori->nama_kategori }}">

        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jenis</label>
            <input type="text" class="form-control" id="jenis" placeholder="" name="jenis"
            name="jenis" 
            value="{{ old('jenis')?? $kategori->jenis }}">

        </div>
        
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-share square"></i> Submit</button>
        </div>
    </form>
</div>
</div>
@endsection
