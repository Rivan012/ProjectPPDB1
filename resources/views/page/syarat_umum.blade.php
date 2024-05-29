@if (!$persyaratan_umum->isEmpty())
<div class="card">

    <h5 class="card-header text-center">{{$persyaratan_umum->first()->judul}}</h5>
    @foreach ($persyaratan_umum as $umum)
    <div class="card-body">
        {!! $umum->isi !!}
    </div>
</div>
@endforeach

@endif
@if (!$persyaratan_lainnya->isEmpty())
<div class="card mt-2 bg-primary-subtle">
    <h5 class="card-header text-center">Persyaratan Lainnya</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('—Pngtree—stack of school books_7693764.png') }}" alt="syarat_umum" width="60%">
            </div>
            <div class="col-md-6">
                @foreach ($persyaratan_lainnya as $lain)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $lain->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {!! $lain->judul !!}
                            </button>
                        </h2>
                        <div id="collapseOne{{ $lain->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $lain->isi !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @endif