<div class="card p-3">
    <form action="{{ route('simpan-biodata') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kode_daftar">NO REG</label>
                    <select name="kode_daftar" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="PPDB-TES-2024">PPDB-TES-2024</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" class="form-control" id="nisn">
                </div>
                <div class="mb-3">
                    <label for="nik">Nik</label>
                    <input type="text" name="nik" class="form-control" id="nik">
                </div>
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ auth()->user()->name }}" readonly name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Peremuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat">
                </div>
                <div class="mb-3">
                    <label for="kab">Kab/Kodya</label>
                    <input type="text" name="kab" class="form-control" id="kab">
                </div>
                <div class="mb-3">
                    <label for="prov">Provinsi</label>
                    <input type="text" name="prov" class="form-control" id="prov">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah">
                </div>
                <div class="mb-3">
                    <label for="npsn_sekolah_asal">NPSN Sekolah Asal</label>
                    <input type="text" name="npsn_sekolah_asal" class="form-control" id="npsn_sekolah_asal">
                </div>
                <div class="mb-3">
                    <label for="thn_lulus">Tahun Lulus</label>
                    <input type="text" name="thn_lulus" class="form-control" id="thn_lulus">
                </div>
                <div class="mb-3">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp">
                </div>
                <div class="mb-3">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" id="">
                        <option selected disabled>Pilih</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">Konghucu</option>
                    </select>
                </div>
            </div>
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