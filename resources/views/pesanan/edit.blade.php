@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Edit Data Pesanan</b>
    </div>
    <div class="card-body">
    <form action="{{ url('pesanan/update/' . $pesanan->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Tanggal Pesanan</label>
            <input type="date" class="form-control" id="tgl_pesanan" value="{{  old('tgl_pesanan')?? $pesanan->tgl_pesanan }}" placeholder=""
                name="tgl_pesanan" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Id Pesanan</label>
            <input type="text" class="form-control" id="nomor-pesanan" value="{{ old('nomor_pesanan')?? $pesanan->nomor_pesanan  }}"
                placeholder="" name="nomor_pesanan" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama-pemesan" value="{{ old('nama_pemesan')?? $pesanan->nama_pemesan  }}" placeholder=""
                required name="nama_pemesan">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Id Barang</label>
            <input type="text" class="form-control" id="nomor-barang" value="{{ old('nomor_barang')?? $pesanan->nomor_barang  }}"
                placeholder="" required name="nomor_barang">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Nama Barang</label>
            <input type="text" class="form-control" id="nama-barang" placeholder="" required name="nama_barang" value="{{ old('nama_barang')?? $pesanan->nama_barang  }}">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jenis</label>
            <input type="text" class="form-control" id="jenis" value="{{ old('jenis')?? $pesanan->jenis  }}" placeholder=""
                required name="jenis">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Ukuran</label>
            <input type="text" class="form-control" id="ukuran" value="{{ old('ukuran')?? $pesanan->ukuran  }}"
                placeholder="" required name="ukuran">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" placeholder="" required name="jumlah" value="{{ old('jumlah')?? $pesanan->jumlah  }}">
        </div>

        
        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-share square"></i> Submit</button>
        </div>
    </form>
</div>
</div>
@endsection
