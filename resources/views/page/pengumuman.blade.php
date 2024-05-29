<div class="card">
    <div class="card-body p-2">
        <h5 style="font-size: 20px;" class="text-center text-success">Pengumuman Terbaru PPDB {{ config('app.web_title') }}</h5>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset('pm.svg') }}" alt="" width="60%">
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    @foreach ($pengumuman as $p)

                    <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#pengumuman{{ $p->id }}" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ $p->title }}</h6>
                            <small><p class="time-ago" data-time="{{ $p->created_at }}">{{ $p->created_at }}</p></small>
                        </div>
                    </a>
                    <div class="modal fade" id="pengumuman{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $p->title }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $p->isi !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>