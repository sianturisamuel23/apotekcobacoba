<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Obat;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Menampilkan data penjualan
    public function index()
    {
        $penjualan = Penjualan::latest()->get();

        return view('penjualan.index', compact('penjualan'));
    }

    // Menampilkan form tambah penjualan
    public function create()
    {
        $obat = Obat::all();

        return view('penjualan.create', compact('obat'));
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:penjualans',
            'tanggal' => 'required',
            'obat_id' => 'required',
            'jumlah' => 'required|integer|min:1'
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        if ($obat->stok < $request->jumlah) {
            return back()
                ->with('error', 'Stok obat tidak mencukupi');
        }

        $subtotal = $obat->harga_jual * $request->jumlah;

        $penjualan = Penjualan::create([
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal' => $request->tanggal,
            'total_harga' => $subtotal
        ]);

        DetailPenjualan::create([
            'penjualan_id' => $penjualan->id,
            'obat_id' => $obat->id,
            'jumlah' => $request->jumlah,
            'harga' => $obat->harga_jual,
            'subtotal' => $subtotal
        ]);

        // Kurangi stok obat
        $obat->stok = $obat->stok - $request->jumlah;
        $obat->save();

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Transaksi berhasil disimpan');
    }

    // Form edit
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('penjualan.edit', compact('penjualan'));
    }

    // Update penjualan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required|numeric'
        ]);

        $penjualan = Penjualan::findOrFail($id);

        $penjualan->update([
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal' => $request->tanggal,
            'total_harga' => $request->total_harga
        ]);

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diupdate');
    }

    // Hapus penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->delete();

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus');
    }
}
?>
