<div class="card p-3">
    <h3 class="m-3 text-primary text-center">Biodata PPBD {{ config('app.web_title') }} </h3>
    @if ($siswa->count() == 0)
    <form action="{{ route('simpan-biodata') }}" method="post">
    @else
    <form action="{{ route('update-biodata') }}" method="post">
        @method('PUT')
    @endif
        @csrf
        <div class="row">
            @foreach ($siswa as $sis)
                
            <div class="col-md-6">
                @if ($sis->kode_daftar == NULL)
                <div class="mb-3">
                    <label for="kode_daftar">NO REG</label>
                    <select name="kode_daftar" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="PPDB-TES-2024">PPDB-TES-2024</option>
                    </select>
                </div>
                @else
                <div class="mb-3">
                    <label for="kode_daftar">NO REG</label>
                    <input type="text" value="{{ $sis->kode_daftar }}" readonly name="kode_daftar" class="form-control"  id="kode_daftar">
                </div>
                @endif
                @if ($sis->nisn == NULL)
                <div class="mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" class="form-control" id="nisn">
                </div>
                @else
                <div class="mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" value="{{ $sis->nisn }}" readonly name="nisn" class="form-control" id="nisn">
                </div>
                @endif
                <div class="mb-3">
                    <label for="nik">Nik</label>
                    <input type="text" name="nik" value="{{ $sis->nik }}" class="form-control" id="nik">
                </div>
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="Laki-laki" @if ($sis->jk == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Peremuan" @if ($sis->jk == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" value="{{ $sis->alamat }}" name="alamat" class="form-control" id="alamat">
                </div>
                <div class="mb-3">
                    <label for="kab">Kab/Kodya</label>
                    <input type="text" value="{{ $sis->kab }}" name="kab" class="form-control" id="kab">
                </div>
                <div class="mb-3">
                    <label for="prov">Provinsi</label>
                    <input type="text" value="{{ $sis->prov }}" name="prov" class="form-control" id="prov">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text"  value="{{ $sis->tempat_lahir }}" name="tempat_lahir" class="form-control" id="tempat_lahir">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" value="{{ $sis->tgl_lahir }}" name="tgl_lahir" class="form-control" id="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input type="text"  value="{{ $sis->asal_sekolah }}" name="asal_sekolah" class="form-control" id="asal_sekolah">
                </div>
                <div class="mb-3">
                    <label for="npsn_sekolah_asal">NPSN Sekolah Asal</label>
                    <input type="text" value="{{ $sis->npsn_sekolah_asal }}" name="npsn_sekolah_asal" class="form-control" id="npsn_sekolah_asal">
                </div>
                <div class="mb-3">
                    <label for="thn_lulus">Tahun Lulus</label>
                    <input type="text"  value="{{ $sis->thn_lulus }}" name="thn_lulus" class="form-control" id="thn_lulus">
                </div>
                <div class="mb-3">
                    <label for="no_telp">No Telepon</label>
                    <input type="number"  value="{{ $sis->no_telp }}" name="no_telp" class="form-control" id="no_telp">
                </div>
                <div class="mb-3">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="Islam" @if ($sis->agama == 'Islam') selected @endif>Islam</option>
                        <option value="Kristen" @if ($sis->agama == 'Kristen') selected @endif>Kristen</option>
                        <option value="Katolik" @if ($sis->agama == 'katolik') selected @endif>Katolik</option>
                        <option value="Hindu" @if ($sis->agama == 'hindu') selected @endif>Hindu</option>
                        <option value="Budha"   @if ($sis->agama == 'budha') selected @endif>Budha</option>
                        <option value="Konghucu"  @if ($sis->agama == 'konghucu') selected @endif>Konghucu</option>
                    </select>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">SIMPAN DAN UPDATE</button>
                </div>
            </div>
        </div>

    </form>


</div>