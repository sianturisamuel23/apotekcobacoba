<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stok',
        'harga_jual'
    ];

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}