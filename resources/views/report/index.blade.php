@extends('layout.main')

@section('judul')
    Halaman Report
@endsection

@section('isi')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penerimaan</h6>
            <div>
                <button class="btn btn-primary btn-sm mr-2" onclick="printTable('dataTablePenerimaan')">Print</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePenerimaan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Penerimaan</th>
                            <th>Nama Petugas</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Tanggal Penerimaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerimaan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_penerimaan }}</td>
                                <td>{{ $item->nama_petugas }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->quantity}}</td>
                                <td>{{ $item->tanggal_terima }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Retur</h6>
            <div>
                <button class="btn btn-primary btn-sm mr-2" onclick="printTable('dataTableRetur')">Print</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableRetur" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Retur</th>
                            <th>Nama Petugas</th>
                            <th>Nama Barang</th>
                            <th>Qty Retur</th>
                            <th>Tanggal Retur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($retur as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_retur }}</td>
                                <td>{{ $item->nama_petugas }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->quantity_retur }}</td>
                                <td>{{ $item->tanggal_retur }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function printTable(tableId) {
            var printWindow = window.open('', '', 'height=500,width=800');
            printWindow.document.write('<html><head><title>Data Table</title></head><body>');
            printWindow.document.write('<table>');
            printWindow.document.write(document.getElementById(tableId).innerHTML);
            printWindow.document.write('</table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endpush
