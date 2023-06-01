@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('content')
    <h2 class="m-0">Data barang masuk</h2>  
    <div class="card p-2" style="font-size: 12px">
            <div class="m-2 d-flex justify-content-end">
                <a type="button" class="btn btn-primary btn-sm" href="{{ url('barangmasuk/create') }}"><i
                        class="fas fa-plus"></i> Tambah</a>
            </div>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover text-center" id="myTable">
                <thead class="thead-light">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Tanggal Masuk</th>
                    <th class="align-middle">Id Barang</th>
                    <th class="align-middle">Nama Barang</th>
                    <th class="align-middle">Jenis</th>
                    <th class="align-middle">Ukuran </th>
                    <th class="align-middle">Jumlah</th>
                    <th class="align-middle">Pengirim</th> 
                    <th class="align-middle">Keterangan</th>
                    <th class="align-middle">Aksi</th>

                </thead>
                <tbody>
                    @foreach ($barangmasuk as $index => $item)
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $item->tgl_barang_masuk }}</td>
                                <td class="align-middle">{{ $item->nomor_barang_masuk }}</td>
                                <td class="align-middle">{{ $item->nama_barang_masuk }}</td>
                                <td class="align-middle">{{ $item->kategori->jenis }}</td>                              
                                <td class="align-middle">{{ $item->ukuran_masuk }}</td>
                                <td class="align-middle">{{ $item->jumlah_masuk }}</td>
                                <td class="align-middle">{{ $item->pengirim }}</td>
                                <td class="align-middle">{{ $item->jenis_masuk }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                <a class="text-white btn btn-primary btn-sm"
                                    href="{{ route('barangmasuk.edit', $item->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('barangmasuk.destroy', $item->id) }}" method="POST">
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
