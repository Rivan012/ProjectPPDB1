<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $no =1;
        $pengumuman = Pengumuman::orderBy('id', 'desc')->simplePaginate(5);

        return view('admin.pengumuman',['pengumuman' => $pengumuman, 'no' => $no]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'isi' => 'required',
        ]);
        $pengumuman = new Pengumuman;
        $pengumuman->title = $request->title;
        $pengumuman->isi = $request->isi;
        $pengumuman->created_at = now()->timezone('Asia/Jakarta');
        $pengumuman->save();
        return redirect('dashboard/pengumuman')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'isi' => 'required',
        ]);
        $pengumuman = Pengumuman::find($request->id);
        $pengumuman->title = $request->title;
        $pengumuman->isi = $request->isi;
        $pengumuman->updated_at = now()->timezone('Asia/Jakarta');
        $pengumuman->save();
        return redirect('dashboard/pengumuman')->with('success', 'Data Berhasil Diubah');
    }
    public function delete(Request $request){
        $pengumuman = Pengumuman::find($request->id);
        $pengumuman->delete();
        return redirect('dashboard/pengumuman')->with('success', 'Data Berhasil Dihapus');
    }
}
