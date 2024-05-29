<div class="card p-3">
    <h5 class="card-title text-center">Silahkan Upload Dokumen Di kolom dokumen yang tersedia</h5>
    <div class="row">
        <div class="col-md-6">
            @if (auth()->user()->foto == NULL )
            <p>Foto Anda Belum di Upload</p>
            <div class="d-grid gap-2">
                <a href="{{ route('up-foto') }}" class="btn btn-primary btn-block" role="button">Upload Foto</a>
            </div>
            @else
            <img src="{{ auth()->user()->foto }}" class="img-fluid" alt="">
            <div class="d-grid gap-2">
                <img src="{{ asset('storage/photo/' . $foto) }}" class="img-thumbnail" alt="">
                <a href="{{ route('up-foto') }}" class="btn btn-primary btn-block" role="button">Ubah Foto</a>
            </div>
            @endif
        </div>
    </div>
</div>