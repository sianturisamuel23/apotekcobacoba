<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'tanggal',
        'total_harga'
    ];

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}