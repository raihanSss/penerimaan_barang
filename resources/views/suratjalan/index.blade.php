@extends('layout.main')

@section('title')
    Halaman surat jaalan
@endsection

@section('judul')
    Halaman Surat Jalan
@endsection

@section('isi')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Surat Jalan</h6>
        @if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
<button type="button" class="close" data-dismiss="alert">X</button>
    {{ session('success') }}
</div>
@endif
        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahModal">
            Input Data Surat Jalan
        </button>
    </div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Surat Jalan</th>
                <th>Nama Petugas</th>
                <th>Nama Supplier</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
                                
        <tbody>
            @foreach ($suratjalan as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->kode_surat_jalan }}</td>
                <td>{{ $surat->nama_petugas }}</td>
                <td>{{ $surat->nama_supplier }}</td>
                <td>{{ $surat->tanggal_masuk }}</td>

                <td>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('suratjalan.destroy', $surat->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach    
        </tbody>
        </table>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@include('suratjalan.tambah')
@endsection