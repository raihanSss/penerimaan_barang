<!-- Modal Tambah Retur -->
<div class="modal fade" id="tambahReturModal" tabindex="-1" role="dialog" aria-labelledby="tambahReturModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahReturModalLabel">Input Data Retur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('retur.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_retur">Kode Retur</label>
                        <input type="text" class="form-control" id="kode_retur" name="kode_retur" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_surat_jalan">Kode Surat Jalan</label>
                        <select class="form-control" id="kode_surat_jalan" name="kode_surat_jalan" required>
                            <option value="">Pilih Kode Surat Jalan</option>
                            <!-- Loop untuk menampilkan pilihan kode surat jalan -->
                            @foreach ($suratjalan as $item)
                                <option value="{{ $item->kode_surat_jalan }}">{{ $item->kode_surat_jalan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_retur">Tanggal Retur</label>
                        <input type="date" class="form-control" id="tanggal_retur" name="tanggal_retur" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control" id="nama_barang" name="nama_barang" required>
                            <option value="">Pilih Nama Barang</option>
                            <!-- Loop untuk menampilkan pilihan nama_barang -->
                            @foreach ($barang as $item)
                                <option value="{{ $item->nama_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity_retur">Quantity Retur</label>
                        <input type="number" class="form-control" id="quantity_retur" name="quantity_retur" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
