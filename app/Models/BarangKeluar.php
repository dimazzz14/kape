<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
    'tgl_barang_keluar',
    'nomor_barang_keluar',
    'nama_barang_keluar',
    'jenis_keluar',
    'ukuran_keluar',
    'jumlah_keluar',
    'penerima',
    'status',
    ];
}
