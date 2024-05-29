<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gelombang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $gelombang = Gelombang::get();
        return view('admin.index',compact('gelombang'));
    }
}
