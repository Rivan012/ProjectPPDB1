<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GelombangController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nama_gelombang' => 'required',
            'deskripsi' => 'required',
            'kode_gelombang' => 'required|min:5',
            'gelombang_buka' => 'required|date',
            'gelombang_tutup' => 'required|date',
        ]);
        $gel = new \App\Models\Gelombang;
        $gel->nama_gelombang = $request->nama_gelombang;
        $gel->deskripsi = $request->deskripsi;
        $gel->kode_gelombang = $request->kode_gelombang;
        $gel->gelombang_buka = $request->gelombang_buka;
        $gel->gelombang_tutup = $request->gelombang_tutup;
        $gel->save();
        return redirect('/dashboard/admin')->with('success','Gelombang Berhasil');
    }
    public function update(Request $request){

        $request->validate([
            'id' => 'required',
            'nama_gelombang' => 'required',
            'deskripsi' => 'required',
            'kode_gelombang' => 'required',
            'gelombang_buka' => 'required|date',
            'gelombang_tutup' => 'required|date',
        ]);

        $gel = \App\Models\Gelombang::find($request->id);
        $gel->nama_gelombang = $request->nama_gelombang;
        $gel->deskripsi = $request->deskripsi;
        $gel->kode_gelombang = $request->kode_gelombang;
        $gel->gelombang_buka = $request->gelombang_buka;
        $gel->gelombang_tutup = $request->gelombang_tutup;
        $gel->save();
        return redirect('/dashboard/admin')->with('success','Gelombang Berhasil');
    }
    public function destroy(Request $request){
        $gel = \App\Models\Gelombang::find($request->id);
        $gel->delete();
        return redirect('/dashboard/admin')->with('success','Gelombang Berhasil');
    }
}
