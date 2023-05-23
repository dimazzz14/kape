@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('content')
    
    <div class="card p-2" style="font-size: 12px">
            <div class="m-2 d-flex justify-content-end">
                <a type="button" class="btn btn-primary btn-sm" href="{{ url('pesanan/create') }}"><i
                        class="fas fa-plus"></i> Tambah</a>
            </div>
        <div class="col-md">
            <table class="table table-sm table-bordered table-hover text-center" id="myTable">
                <thead class="thead-light">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Tanggal Pesanan</th>
                    <th class="align-middle">Nomor Pesanan</th>
                    <th class="align-middle">Nama Pemesan</th>
                    <th class="align-middle">Nomor Barang</th>
                    <th class="align-middle">Nama Barang </th>
                    <th class="align-middle">Jenis</th>
                    <th class="align-middle">Ukuran</th>
                    <th class="align-middle">Jumlah</th>
                    <th class="align-middle">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($pesanan as $index => $item)
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $item->tgl_pesanan }}</td>
                                <td class="align-middle">{{ $item->nomor_pesanan }}</td>
                                <td class="align-middle">{{ $item->nama_pemesan }}</td>
                                <td class="align-middle">{{ $item->nomor_barang}}</td>
                                <td class="align-middle">{{ $item->nama_barang }}</td>
                                <td class="align-middle">{{ $item->jenis }}</td>
                                <td class="align-middle">{{ $item->ukuran }}</td>
                                <td class="align-middle">{{ $item->jumlah }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                <a class="text-white btn btn-primary btn-sm"
                                    href="{{ route('pesanan.edit', $item->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pesanan.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DElETE')
                                <button class="btn btn-danger btn-sm mx-1" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endpush
@endsection
