<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kategori';
    protected $fillable = [
    'nomor_kategori',
    'nama_kategori',
    'jenis',
    ];
    public function barangMasuk(){
        return $this->hasMany(BarangMasuk::class, 'kategori_id','id');
    }
}
