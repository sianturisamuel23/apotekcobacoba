<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        $obat = Obat::latest()->get();

        return view('obat.index', compact('obat'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data obat
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        Obat::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.edit', compact('obat'));
    }

    // Mengupdate data obat
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat,' . $id,
            'nama_obat' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        $obat->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil diupdate');
    }

    // Menghapus data obat
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus');
    }
}