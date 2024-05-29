<div class="card card-waves">
    <div class="row">
        <div class="col-md-6">
            <div class="card-body p-3">
                <h1 style="font-size: 40px;" class="text-warning">{{ config('app.web_title') }}</h1>
                @if ($gelombang->isEmpty())
                <h5>PPDB DITUTUP SILAHKAN LOGIN MENGGUNAKAN AKUN YANG SUDAH DIDAFTARKAN</h5>
                @if (Route::has('login'))
                @auth
                <div class="d-grid gap-2">
                    <a class="btn btn-primary mb-2" href="{{ route(Auth()->user()->role) }}">Dashboard</a>
                </div>
                @else
                <div class="d-grid gap-2">
                    <a class="btn btn-primary mb-2" href="{{ route('login') }}">Login</a>
                </div>
                @endauth
                @endif
                @else
                @foreach ($gelombang as $g)
                <h2 class="text-primary">{{ $g->nama_gelombang }}</h2>
                <p>{{ $g->deskripsi }}</p>
                <div class="card p-3">
                    <h5 class="text-primary">Pendaftaran mulai tanggal {{ $g->gelombang_buka }} sampai {{ $g->gelombang_tutup }}</h5>
                    <div id="countdown" class="text-primary"></div>
                    @if (Route::has('login'))
                    @auth
                    <a class="btn btn-primary mb-2" href="{{ route(Auth()->user()->role) }}">Dashboard</a>
                    @else
                    <a class="btn btn-primary mb-2" href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary mb-2">Daftar</a>
                    @endauth
                    @endif
                </div>
                @endforeach
                @endif

            </div>
        </div>

        <div class="col-lg-6 mt-4"><img class="img-fluid" src="https://ppdb.smkn-tgm.sch.id/assets/img/kultur.png" width="100%" /></div>
    </div>
</div>