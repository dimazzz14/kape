<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $fillable = [
    'tgl_stok',
    'nomor_stok',
    'nama_stok',
    'jenis_stok',
    'ukuran_stok',
    'jumlah_stok',
    ];
}
