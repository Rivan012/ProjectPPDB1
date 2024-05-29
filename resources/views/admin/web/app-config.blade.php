<x-navbar-layout>
    <x-slot name="slot">
        <a href="{{ route('admin') }}" class="btn btn-success">Kembali</a>
        <form action="{{ route('web.store') }}" method="post">
            @csrf
            @method('put')
            <div class="card p-2">
                <div class="card-header">
                    <h5>Pengaturan Aplikasi PPDB {{ config('app.web_title') }}</h5>

                </div>
                <div class="card-body">
                    @foreach ($infoweb as $i)
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ $i->key }}</label>
                        <input type="text" name="{{ $i->key }}" class="form-control @error($i->key)
                            is-invalid
                        @enderror" id="title" value="{{ $i->value }}">
                    </div>
                    @endforeach
                </div>
                <div class="card-footer text-right d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>

    </x-slot>
</x-navbar-layout>