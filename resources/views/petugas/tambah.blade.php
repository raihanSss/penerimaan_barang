<!-- Modal Tambah Petugas -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah petugas -->
                <form method="POST" action="{{ route('petugas.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" maxlength="7" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama"required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_petugas">Alamat</label>
                        <textarea class="form-control" id="alamat_petugas" name="alamat_petugas" rows="3" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp_petugas">No Telp</label>
                        <input type="text" class="form-control" id="no_telp_petugas" name="no_telp_petugas" placeholder="Masukkan No Telp" maxlength="10" pattern="[0-9]{10}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="">--Pilih--</option>
                            <option value="staff">Staff</option>
                            <option value="direktur">Direktur</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
