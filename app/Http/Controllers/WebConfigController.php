<?php

namespace App\Http\Controllers;

use App\Models\WebConfig;
use Illuminate\Http\Request;

class WebConfigController extends Controller
{
    public function index(){
        $infoweb = WebConfig::all();
        return view('admin.web.app-config', compact('infoweb'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        // Tentukan aturan validasi
        $validatedData = $request->validate([
            'web_title' => 'required|string|max:255',
            'web_url' => 'required|max:255',
            'web_keyword' => 'required|string|max:255',
            'web_description' => 'required|string|max:255',
            'web_no_telp' => 'required|string|max:255',
            'web_email' => 'required|email|max:255',
        ]);

        $webTitle = $validatedData['web_title'];
        $webUrl = $validatedData['web_url'];
        $webKeyword = $validatedData['web_keyword'];
        $webDescription = $validatedData['web_description'];
        $webNoTelp = $validatedData['web_no_telp'];
        $webEmail = $validatedData['web_email'];


        // Memperbarui data di database
        WebConfig::where('key', 'web_title')->update(['value' => $webTitle]);
        WebConfig::where('key', 'web_url')->update(['value' => $webUrl]);
        WebConfig::where('key', 'web_keyword')->update(['value' => $webKeyword]);
        WebConfig::where('key', 'web_description')->update(['value' => $webDescription]);
        WebConfig::where('key', 'web_no_telp')->update(['value' => $webNoTelp]);
        WebConfig::where('key', 'web_email')->update(['value' => $webEmail]);
        // Redirect atau mengembalikan response yang sesuai
        return redirect('/dashboard/sekolah')->with('success', 'Settings updated successfully!');
    }
}
