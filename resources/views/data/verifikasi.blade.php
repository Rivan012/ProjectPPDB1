@csrf
<input type="hidden" name="nisn" value="{{ $sis->nisn }}" id="">
@if ($sis->agama == 'Islam')
<input type="hidden" name="nama_sistem_penilaian" value="NILAI MENGAJI">
<h5>NILAI MENGAJI</h5>
<div class="mb-3">
    <label for="nilai" class="form-label">Nilai</label>
    <input type="text" class="form-control" id="nilai" name="nilai">
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
</div>
@endif
<input type="hidden" name="nama_sistem_penilaian2" value="NILAI BACA TULIS">
<h5>NILAI BACA TULIS</h5>
<div class="mb-3">
    <label for="nilai" class="form-label">Nilai</label>
    <input type="text" class="form-control" id="nilai" name="nilai2">
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi2">
</div>