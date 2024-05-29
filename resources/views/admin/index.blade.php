<x-navbar-layout>
    <x-slot name="slot">
        <h1 class="h3 mb-2 text-gray-800">Gelombang</h1>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#create-gel">Tammbah Gelombang</button>
                @include('admin.gelombang-create')
           </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gelombang</th>
                                    <th>Deskripsi</th>
                                    <th>Kode Tes</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($gelombang as $gel)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $gel->nama_gelombang }}</td>
                                    <td width="350px">{{ $gel->deskripsi }}</td>
                                    <td>{{ $gel->kode_gelombang }}</td>
                                    <td width="120px"><?php
                                                        $date = date_create($gel->gelombang_buka);
                                                        echo date_format($date, "d-M-Y H:i:s");
                                                        ?></td>
                                    <td width="120px"><?php
                                                        $date = date_create($gel->gelombang_tutup);
                                                        echo date_format($date, "d-M-Y H:i:s");
                                                        ?></td>
                                    <td class="text-center">
                                        @if ($gel->gelombang_buka <= now()->timezone('Asia/Jakarta') && $gel->gelombang_tutup >= now()->timezone('Asia/Jakarta'))
                                            <span class="badge bg-success">Buka</span>
                                            @else
                                            <span class="badge bg-danger">Tutup</span>
                                            @endif
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Gel{{ $gel->id }}"><i class="bi bi-pencil-square"></i></button>
                                        @include('admin.edit-gel')
                                        <form action="{{ route('gelombang.delete') }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $gel->id }}">
                                            <button type="submit" id="delete-btn" class="btn btn-danger btn-sm  delete-btn "><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gelombang</th>
                                    <th>Ket</th>
                                    <th>Kode Tes</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-navbar-layout>