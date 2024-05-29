<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seo = \App\Models\Seo::all();
        return view('admin.web.seo',['seo'=>$seo]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'robots' => 'required|string|max:255',
            'googlebot' => 'required|string|max:255',
            'google-site-verification' => 'string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $robots = $validatedData['robots'];
        $googlebot = $validatedData['googlebot'];
        $googleSiteVerification = $validatedData['google-site-verification'];
        $author = $validatedData['author'];
        $description = $validatedData['description'];


        // Memperbarui data di database
        Seo::where('name', 'robots')->update(['value' => $robots]);
        Seo::where('name', 'googlebot')->update(['value' => $googlebot]);
        Seo::where('name', 'google-site-verification')->update(['value' => $googleSiteVerification]);
        Seo::where('name', 'author')->update(['value' => $author]);
        Seo::where('name', 'description')->update(['value' => $description]);

        return redirect('/dashboard/seo')->with('success', 'Settings updated successfully!');
    }
}
