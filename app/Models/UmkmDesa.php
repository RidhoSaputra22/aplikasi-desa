<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmDesa extends Model
{
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar',
        'no_hp',
        'kategori_umkm_id'
    ];

    public function kategoriUmkm()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm_id');
    }

    public function getGambarAttribute()
    {
        if (!$this->attributes['gambar']) {
            return null;
        }

        return asset('storage/' . $this->attributes['gambar']);
    }
}
