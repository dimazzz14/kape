<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
    'tgl_barang_masuk',
    'nomor_barang_masuk',
    'nama_barang_masuk',
    'jenis_masuk',
    'ukuran_masuk',
    'jumlah_masuk',
    'pengirim',
    ];
}
