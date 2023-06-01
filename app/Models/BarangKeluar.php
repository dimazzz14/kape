<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'barang_keluar';
    protected $fillable = [
    'tgl_barang_keluar',
    'nomor_kategori',
    'nama_barang_keluar',
    'jenis_keluar',
    'nomor_barang_keluar',
    'ukuran_keluar',
    'jumlah_keluar',
    'penerima',
    'status',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id','id');
    }
}
