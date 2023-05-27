@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Edit Data Barang</b>
        </div>
        <div class="card-body">
            <form action="{{ url('barangmasuk/update/' . $barangmasuk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
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
                    <input type="date" class="form-control" id="tgl_barang_masuk" 
                        name="tgl_barang_masuk"
                        value="{{ old('tgl_barang_masuk')?? $barangmasuk->tgl_barang_masuk}}">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Barang</label>
                    <input type="text" class="form-control" id="nomor-masuk"
                        name="nomor_barang_masuk"
                        value="{{ old('nomor_barang_masuk')?? $barangmasuk->nomor_barang_masuk}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Nama Barang</label>
                    <input type="text" class="form-control" id="barang-masuk"
                        name="nama_barang_masuk"
                        value="{{ old('nama_barang_masuk')?? $barangmasuk->nama_barang_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Jenis</label>
                    <input type="text" class="form-control" id="jenis-masuk"
                        name="jenis_masuk"
                        value="{{ old('jenis_masuk')?? $barangmasuk->jenis_masuk}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Ukuran</label>
                    <input type="text" class="form-control" id="ukuran-masuk"
                        name="ukuran_masuk"
                        value="{{ old('ukuran_masuk')?? $barangmasuk->ukuran_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah-masuk"
                        name="jumlah_masuk"
                        value="{{ old('jumlah_masuk')?? $barangmasuk->jumlah_masuk }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Pengirim</label>
                    <input type="text" class="form-control" id="pengirim-masuk"
                        name="pengirim"
                        value="{{ old('pengirim')??$barangmasuk->pengirim}}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary" style="width: 150px"><i
                        class="fas fa-share-square"></i>Submit</button>
            </form>
        </div>
    </div>


@endsection
