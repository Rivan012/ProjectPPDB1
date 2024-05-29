<?php

namespace App\Http\Controllers;

use App\Models\SistemPenilaian;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $no = 1;
        $siswa = Siswa::with('user')->get();
        $sistemPenilaian = SistemPenilaian::whereIn('nisn', $siswa->pluck('nisn'))->get();
        return view('data.siswa-data', ['siswa' => $siswa, 'no' => $no, 'sistemPenilaian' => $sistemPenilaian]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sistem_penilaian' => 'required|string',
            'deskripsi' => 'required|string',
            'nilai' => 'required',
            'nisn' => 'required',
            'nama_sistem_penilaian2' => 'required|string',
            'deskripsi2' => 'required|string',
            'nilai2' => 'required',
        ]);

        $namaSistemPenilaian = $validatedData['nama_sistem_penilaian'];
        $deskripsi = $validatedData['deskripsi'];
        $nilai = $validatedData['nilai'];
        $nisn = $validatedData['nisn'];
        $namaSistemPenilaian2 = $validatedData['nama_sistem_penilaian2'];
        $deskripsi2 = $validatedData['deskripsi2'];
        $nilai2 = $validatedData['nilai2'];
        if (!$namaSistemPenilaian) {
            SistemPenilaian::create([
                'nisn' => $nisn,
                'nama_sistem_penilaian' => $namaSistemPenilaian2,
                'deskripsi' => $deskripsi2,
                'nilai' => $nilai2,
            ]);
        } else {
            SistemPenilaian::create([
                'nisn' => $nisn,
                'nama_sistem_penilaian' => $namaSistemPenilaian,
                'deskripsi' => $deskripsi,
                'nilai' => $nilai,
            ]);
            SistemPenilaian::create([
                'nisn' => $nisn,
                'nama_sistem_penilaian' => $namaSistemPenilaian2,
                'deskripsi' => $deskripsi2,
                'nilai' => $nilai2,
            ]);
        }
        Siswa::where('nisn', $nisn)->update(['status' => 2]);

        return redirect('/dashboard/siswa/daftar')->with('success', 'Sukses Verifikasi Siswa');
    }
    public function updateterima(Request $request)
    {
        $nisn = $request->nisn;
        Siswa::where('nisn', $nisn)->update(['status' => 3]);
        return redirect('/dashboard/siswa/daftar')->with('success', 'Siswa Diterima');
    }
    public function updatetolak(Request $request)
    {
        $nisn = $request->nisn;
        Siswa::where('nisn', $nisn)->update(['status' => 4]);
        return redirect('/dashboard/siswa/daftar')->with('success', 'Siswa Ditolak');
    }
    public function biodatasimpan(Request $request)
    {
        $validate = $request->validate([
            'kode_daftar' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'asal_sekolah' => 'required',
            'npsn_sekolah_asal' => 'required',
            'thn_lulus' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kab' => 'required',
            'prov' => 'required',
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)->first();

        if ($siswa != null) {
            $siswa->update($validate);
            return redirect('/dashboard/siswa')->with('success', 'Sukses Update Data Kamu');
        } else {
            $siswa = new Siswa();
            $siswa->kode_daftar = $request->kode_daftar . '-' . auth()->user()->id;
            $siswa->nisn = $request->nisn;
            $siswa->user_id = auth()->user()->id;
            $siswa->nik = $request->nik;
            $siswa->jk = $request->jk;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tgl_lahir = $request->tgl_lahir;
            $siswa->asal_sekolah = $request->asal_sekolah;
            $siswa->npsn_sekolah_asal = $request->npsn_sekolah_asal;
            $siswa->thn_lulus = $request->thn_lulus;
            $siswa->no_telp = $request->no_telp;
            $siswa->agama = $request->agama;
            $siswa->alamat = $request->alamat;
            $siswa->kab = $request->kab;
            $siswa->prov = $request->prov;
            $siswa->save();
            return redirect('/dashboard/siswa')->with('success', 'Sukses Update Data Kamu');
        }
    }
    public function biodataupdate(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'asal_sekolah' => 'required',
            'npsn_sekolah_asal' => 'required',
            'thn_lulus' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kab' => 'required',
            'prov' => 'required',
        ]);
        User::where('id', auth()->user()->id)->update(['name' => $request->name]);
        Siswa::where('nisn', $request->nisn)->update($validate);
        return redirect('/dashboard/siswa')->with('success', 'Sukses Update Data Kamu');
    }
    public function foto()
    {
        $foto = User::where('id', auth()->user()->id)->value('foto');
        return view('page-siswa.siswa-foto', ['foto' => $foto]);
    }
    public function fotoup(Request $request)
    {
        // Validasi input gambar
        $data = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('foto');

        $fileName = auth()->user()->name .'-'. date('Y-M-d').'.' . $file->getClientOriginalExtension();
        $path = public_path('storage/photo');
        $file->move($path, $fileName);
        User::where('id',auth()->user()->id)->update(['foto'=>$fileName]);
        return redirect('/dashboard/siswa/foto')->with('success', 'Sukses Update Data Kamu');
    }
    public function fotoupdate(Request $request)
    {
        $data = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $userid = auth()->user()->id;
        $foto = User::where('id', $userid)->value('foto');
        
        $file = $request->file('foto');
        $fileName = auth()->user()->name .'-'. date('Y-M-d').'.' . $file->getClientOriginalExtension();
        $oldPath = public_path('storage/photo/' . $foto);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
        $path = public_path('storage/photo');
        $file->move($path, $fileName);
        User::where('id',auth()->user()->id)->update(['foto'=>$fileName]);
        return redirect('/dashboard/siswa/foto')->with('success', 'Sukses Update Data Kamu');
    }
}
