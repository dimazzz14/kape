@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <label for="exampleInputEmail1">Kelola Akun</label>
    </div>
    <div class="card-body px-5 py-3">
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="email" placeholder="" required name="email">
        </div>


        <div class="form-group">
            <label for="exampleInputtext1">Password</label>
            <input type="text" class="form-control" id="password" placeholder="" required name="password">
        </div>


        <div class="d-flex justify-content-end">
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </form>
</div>
</div>

@endsection
