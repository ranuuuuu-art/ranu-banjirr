<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function form()
    {
        return view('lapor');
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi' => 'required|numeric|min:0',
        ]);

        $nama = $request->input('nama');
        $lokasi = $request->input('lokasi');
        $tinggi = $request->input('tinggi');

        return view('konfirmasi', compact('nama', 'lokasi', 'tinggi'));
    }
}