@foreach ($barang as $item)
<!-- Modal Edit Supplier -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit supplier -->
                <form method="POST" action="{{ route('barang.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="kode barang" value="{{ $item->kode_barang }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <textarea class="form-control" id="nama_barang" name="nama_barang" rows="3" placeholder="nama barang">{{ $item->nama_barang }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok Barang</label>
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang" placeholder="stok barang" value="{{ $item->stok_barang }}">
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
