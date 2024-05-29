<x-navbar-layout>
    <x-slot name="slot">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#p">Buat Pengumuman</button>
                @include('admin.pengumuman-create')
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
                                    <th>Nama Pengumuman</th>
                                    <th>Isi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengumuman as $p)

                                <tr>
                                    <td width="20px">{{ $no++ }}</td>
                                    <td width="200px">{{ $p->title }}</td>
                                    <td>{!! $p->isi !!}</td>
                                    <td width="70px">
                                        <button type="button" class="btn btn-primary d-inline btn-sm" data-bs-toggle="modal" data-bs-target="#p{{ $p->id }}"><i class="bi bi-pencil-square"></i></button>
                                        @include('admin.edit-peng')
                                        <form action="{{ route('pengumuman.delete') }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <button type="submit" id="delete-btn" class="btn btn-danger btn-sm  delete-btn"><i class="bi bi-trash"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengumuman</th>
                                    <th>Isi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-end">

                            {{ $pengumuman->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-navbar-layout>