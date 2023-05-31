<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = [
    'tgl_pesanan',
    'nomor_pesanan',
    'nama_pemesan',
    'nomor_barang',
    'nama_barang',
    'jenis',
    'ukuran',
    'jumlah',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id','id');
    }
}
