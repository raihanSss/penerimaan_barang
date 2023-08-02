@foreach ($petugas as $item)
<!-- Modal Edit Petugas -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit petugas -->
                <form method="POST" action="{{ route('petugas.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" maxlength="7" value="{{ $item->nip }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama" value="{{ $item->nama_petugas }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_petugas">Alamat</label>
                        <input type="text" class="form-control" id="alamat_petugas" name="alamat_petugas" placeholder="Masukkan Alamat" value="{{ $item->alamat_petugas }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telp_petugas">No Telp</label>
                        <input type="text" class="form-control" id="no_telp_petugas" name="no_telp_petugas" placeholder="Masukkan No Telp" maxlength="10" pattern="[0-9]{10}" value="{{ $item->no_telp_petugas }}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="staff" {{ $item->jabatan === 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="direktur" {{ $item->jabatan === 'direktur' ? 'selected' : '' }}>Direktur</option>
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
@endforeach
