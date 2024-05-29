<x-navbar-layout>
    <x-slot name="slot">
        <div class="card p-3 mt-3">
            @if ($foto > 0)
            <div class="card-body">
                <h5 class="card-title">Update Foto</h5>

                <form action="{{ route('up-foto-update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <!-- Elemen gambar untuk pratinjau atau gambar default -->
                        <div id="preview-foto">
                            @if ($foto)
                            <img src="{{ asset('storage/photo/' . $foto) }}" alt="foto" width="200" height="200" class="img-thumbnail" id="foto-preview">
                            @else
                            <img src="{{ asset('storage/photo/' . $foto) }}" alt="foto" width="200" height="200" class="img-thumbnail" id="foto-preview">
                            @endif
                        </div>
                        <label for="formFile" class="form-label"></label>
                        <input class="form-control" type="file" name="foto" id="formFile" onchange="previewFoto()" accept=".jpg, .jpeg, .png">
                    </div>
                    <script>
                        function previewFoto() {
                            var file = document.getElementById('formFile').files[0];
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('foto-preview').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    </script>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                    </div>
                </form>

            </div>
        </div>
        @else
        <div class="card-body">
            <h5 class="card-title">Upload Foto</h5>
            <div id="preview-foto"></div>
            <form action="{{ route('up-foto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto" id="formFile" onchange="previewFoto()" accept=".jpg, .jpeg, .png">

                </div>
                <script>
                    function previewFoto() {
                        var file = document.getElementById('formFile').files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('preview-foto').innerHTML = `<img src="${e.target.result}" width="200" height="200" class="img-thumbnail">`
                        };
                        reader.readAsDataURL(file);
                    }
                </script>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                </div>
            </form>
        </div>
        @endif
        </div>
    </x-slot>
</x-navbar-layout>