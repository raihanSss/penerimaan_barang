@extends('layout.main')

@section('judul')
    Halaman Penerimaan
@endsection

@section('isi')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penerimaan</h6>
            @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session('success') }}
                </div>
            @endif
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahPenerimaanModal">
                Input Data penerimaan
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="auto;" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Penerimaan</th>
                            <th>Kode Surat Jalan</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal Terima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($penerimaan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_penerimaan }}</td>
                                <td>{{ $item->kode_surat_jalan }}</td>
                                <td>{{ $item->nama_petugas }}</td>
                                <td>{{ $item->tanggal_terima }}</td>
                                <td>
                                    <!-- Tombol Details -->
                                    <button class="btn btn-primary btn-sm btn-detail" data-nama-supplier="{{ $item->nama_supplier }}"
                                        data-nama-barang="{{ $item->nama_barang }}" data-quantity="{{ $item->quantity }}"
                                        data-toggle="modal" data-target="#detailModalPenerimaan">
                                        Detail
                                    </button>
                                
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('penerimaan.destroy', $item->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    @include('penerimaan.tambah')
    @include('penerimaan.detail')
@endsection

@push('script_penerimaan')
<script>
    $(document).ready(function() {
        // Tangkap klik tombol Detail
        $('.btn-detail').on('click', function() {
            var namaBarang = $(this).data('nama-barang');
            var quantity = $(this).data('quantity');
            var namaSupplier = $(this).data('nama-supplier');

            // Isi data ke dalam modal
            $('#detailNamaBarang').text(namaBarang);
            $('#detailQuantity').text(quantity);
            $('#detailNamaSupplier').text(namaSupplier);
        });
    });
</script>
@endpush