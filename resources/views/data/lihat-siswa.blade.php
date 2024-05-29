<ul class="list-group">
  @if ($sis->status == 1)
  <span class="badge bg-danger">Belum Verifikasi</span>
  @elseif ($sis->status == 2)
  <span class="badge bg-primary">Terverifikasi</span>
  @elseif ($sis->status == 3)
  <span class="badge bg-success">Diterima</span>
  @elseif ($sis->status == 4)
  <span class="badge bg-danger">Ditolak</span>
  @endif
  @foreach ($sistemPenilaian as $sp)
  @if ($sp->nama_sistem_penilaian == 'NILAI MENGAJI')
  <li class="list-group-item text-center">Nilai Mengaji : {{ $sp->nilai }}</li>
  <li class="list-group-item text-center">{{ $sp->deskripsi }}</li>
  @elseif ($sp->nama_sistem_penilaian == 'NILAI BACA TULIS')
  <li class="list-group-item text-center">NILAI BACA TULIS : {{ $sp->nilai }}</li>
  <li class="list-group-item text-center">{{ $sp->deskripsi }}</li>


  @endif
  @endforeach
  <li class="list-group-item active">Data Siswa</li>
  <li class="list-group-item">NO REG : {{ $sis->kode_daftar }}</li>
  <li class="list-group-item">NISN : {{ $sis->nisn }}</li>
  <li class="list-group-item">Nama : {{ $sis->user->name }}</li>
  <li class="list-group-item">Jenis Kelamin : {{ $sis->jk }}</li>
  <li class="list-group-item">Alamat : {{ $sis->alamat }}</li>
  <li class="list-group-item">Kab/Kodya : {{ $sis->kab }}</li>
  <li class="list-group-item">Provinsi : {{ $sis->prov }}</li>
  <li class="list-group-item">Tempat Lahir : {{ $sis->tempat_lahir }}</li>
  <li class="list-group-item">Tanggal Lahir : {{ \Carbon\Carbon::parse($sis->tgl_lahir)->format('d-m-Y') }}</li>
  <li class="list-group-item">Asal Sekolah : {{ $sis->asal_sekolah }}</li>
  <li class="list-group-item">NPSN Sekolah Asal : {{ $sis->npsn_sekolah_asal }}</li>
  <li class="list-group-item">Tahun Lulus : {{ $sis->thn_lulus }}</li>
  <li class="list-group-item">No Telepon : {{ $sis->no_telp }}</li>
  <li class="list-group-item">Agama : {{ $sis->agama }}</li>
</ul>