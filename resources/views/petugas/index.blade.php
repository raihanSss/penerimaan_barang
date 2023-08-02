@extends('layout.main')

@section('title')
    Halaman Petugas
@endsection

@section('judul')
    Halaman Petugas
@endsection

@section('isi')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
            @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('success') }}
                </div>
            @endif
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahModal">
                Tambah Petugas
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama_petugas }}</td>
                                <td>{{ $item->alamat_petugas }}</td>
                                <td>{{ $item->no_telp_petugas }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="#editModal{{ $item->id }}" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('petugas.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus petugas ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Petugas -->
    @include('petugas.tambah')
    @include('petugas.edit')

@endsection
