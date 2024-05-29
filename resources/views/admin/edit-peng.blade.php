<div class="modal fade" id="p{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editorForm" action="{{ route('pengumuman.update') }}" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengumuman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ $p->id }}" name="id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $p->title }}">
                    </div>
                    <x-btn-edit></x-btn-edit>
                    <div id="editor" contenteditable="true">
                        {!! $p->isi !!}
                    </div>
                    <textarea name="isi" id="content" style="display:none;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>

        </div>
    </div>
</div>