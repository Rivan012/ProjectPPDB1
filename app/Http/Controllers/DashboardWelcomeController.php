<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class DashboardWelcomeController extends Controller
{
    public function index()
    {
        $now = now()->timezone('Asia/Jakarta');
        // dd($now); // Mendapatkan waktu saat ini dengan zona waktu GMT+7
        $gelombang = Gelombang::where('gelombang_buka', '<=', $now)
                                ->where('gelombang_tutup', '>=', $now)
                                ->get();
        $pengumuman = \App\Models\Pengumuman::orderBy('id', 'desc')->take(6)->get();
        $persyaratan_umum = \App\Models\Persayaratan::where('kategory','umum')->get();
        $persyaratan_lainnya = \App\Models\Persayaratan::where('kategory','lainnya')->get();
        $tmln = \App\Models\TimeLine::orderBy('id', 'asc')->get();
        $seo = \App\Models\Seo::all();

        return view('welcome', compact('persyaratan_umum', 'persyaratan_lainnya', 'gelombang', 'pengumuman','tmln','seo'));
    }
}
