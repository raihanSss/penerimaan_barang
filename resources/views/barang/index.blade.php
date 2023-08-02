@extends('layout.main')

@section('title')
    Halaman Barang
@endsection

@section('judul')
    Halaman Barang
@endsection

@section('isi')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('success') }}
                </div>
            @endif
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahModal">
                Tambah Data Barang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok_barang }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="#editModal{{ $item->id }}" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('barang.tambah')
    @include('barang.edit')

@endsection
