<x-navbar-layout>
    <x-slot name="slot">
        <a href="{{ route(auth()->user()->role) }}" class="btn btn-success">Kembali</a>
        <div class="card p-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h5>Data Siswa</h5>
                        <p>Berikut adalah data siswa pendaftar {{ config('app.web_title') }}</p>

                    </div>
                    <div class="col-md-4 justify-content-end text-end">
                        <a href="" class="btn btn-primary ms-auto">Daftarkan Siswa</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nisn</th>
                                <th>Nama Siswa</th>
                                <th>Kode Daftar</th>
                                <th>Status</th>
                                <th>Lainya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $sis)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $sis->nisn }}</td>
                                <td>{{ $sis->user->name }}</td>
                                <td>{{ $sis->kode_daftar }}</td>
                                <td>
                                    @if ($sis->status == 1)
                                    <span class="badge bg-danger">Belum Verifikasi</span>
                                    @elseif ($sis->status == 2)
                                    <span class="badge bg-primary">Terverifikasi</span>
                                    @elseif ($sis->status == 3)
                                    <span class="badge bg-success">Diterima</span>
                                    @elseif ($sis->status == 4)
                                    <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a class="badge bg-success" data-bs-toggle="modal" data-bs-target="#lihat{{ $sis->nisn }}">
                                        Lihat <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    @if ($sis->status == 1)
                                    <a class="badge bg-success" data-bs-toggle="modal" data-bs-target="#verifikasi">Verifikasi</a>
                                    @elseif ($sis->status == 2)
                                    <form action="{{ route('terima') }}" method="post" class="d-inline">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $sis->nisn }}" name="nisn" id="">
                                        <button class="btn btn-primary btn-sm"><i class="bi bi-patch-check"></i></button>
                                    </form>
                                    <form action="{{ route('tolak') }}" method="post" class="d-inline">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $sis->nisn }}" name="nisn" id="">
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                    </form>
                                    @elseif ($sis->status == 3)
                                    <form action="{{ route('tolak') }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $sis->nisn }}" name="nisn" id="">
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                    </form>
                                    @elseif ($sis->status == 4)

                                    <form action="{{ route('terima') }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $sis->nisn }}" name="nisn" id="">
                                        <button class="btn btn-primary btn-sm"><i class="bi bi-patch-check"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>

                            @include('data.modal')
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <span class="badge bg-danger">
                                        Tidak ada data
                                    </span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nisn</th>
                                <th>Nama Siswa</th>
                                <th>Kode Daftar</th>
                                <th>Status</th>
                                <th>Lainya</th>
                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-navbar-layout>