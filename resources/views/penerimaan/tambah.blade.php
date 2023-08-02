<!-- Modal Tambah Data Penerimaan -->
<div class="modal fade" id="tambahPenerimaanModal" tabindex="-1" role="dialog" aria-labelledby="tambahPenerimaanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenerimaanModalLabel">Tambah Data Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambahPenerimaanForm" action="{{ route('penerimaan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_penerimaan">Kode Penerimaan</label>
                        <input type="text" class="form-control" id="kode_penerimaan" name="kode_penerimaan" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_surat_jalan">Kode Surat Jalan</label>
                        <select class="form-control" id="kode_surat_jalan" name="kode_surat_jalan" required>
                            <option value="">--Pilih--</option>
                            @foreach ($suratjalan as $surat)
                                <option value="{{ $surat->kode_surat_jalan }}">{{ $surat->kode_surat_jalan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_terima">Tanggal Terima</label>
                        <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima" readonly required>
                    </div>

                    <hr>

                    <h5>Data barang yang Diterima</h5>

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
                    
                    <div class="col">
                    <div class="form-group">
                    <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

