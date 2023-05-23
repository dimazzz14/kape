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
            </div>
        <div class="col-md">
            <table class="table table-sm table-bordered table-hover text-center" id="myTable">
                <thead class="thead-light">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Tanggal Masuk</th>
                    <th class="align-middle">Nomor Barang</th>
                    <th class="align-middle">Nama Barang</th>
                    <th class="align-middle">Jenis</th>
                    <th class="align-middle">Ukuran </th>
                    <th class="align-middle">Jumlah</th>
                </thead>
                <tbody>
                    @foreach ($stok as $index => $item)
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $item->tgl_stok }}</td>
                                <td class="align-middle">{{ $item->nomor_stok }}</td>
                                <td class="align-middle">{{ $item->nama_stok }}</td>
                                <td class="align-middle">{{ $item->jenis_stok }}</td>
                                <td class="align-middle">{{ $item->ukuran_stok }}</td>
                                <td class="align-middle">{{ $item->jumlah_stok }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                <a class="text-white btn btn-primary btn-sm"></a>
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
