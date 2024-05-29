<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashSiswaController extends Controller
{
    public function tampildashsiswa()
    {
        $foto = User::where('id', auth()->user()->id)->value('foto');
        $siswa = DB::table('siswas')->where('user_id', Auth::user()->id)->get();
        return view('siswa.index',[
            'siswa' => $siswa,
            'foto' => $foto
        ]);
    }
}
