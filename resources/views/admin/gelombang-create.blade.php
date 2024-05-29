<div class="modal fade" id="create-gel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('gelombang.store') }}" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Gelombang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="Nama_Gelombang" class="form-label">Nama Gelombang</label>
                        <input type="text" name="nama_gelombang" class="form-control" id="Nama_Gelombang">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="kode_gelombang" class="form-label">Kode</label>
                        <input type="text" name="kode_gelombang" class="form-control" id="kode_gelombang">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_buka" class="form-label">Buka</label>
                        <input type="datetime-local" name="gelombang_buka" class="form-control" id="tanggal_buka" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tutup" class="form-label">Tutup</label>
                        <input type="datetime-local" name="gelombang_tutup" class="form-control" id="tanggal_tutup">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>