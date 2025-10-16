<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKemiskinan extends Model
{
    //
    protected $fillable = [
        'nama_kategori',
    ];

    protected $casts = [
        'nama_kategori' => 'string',
    ];

    // public function setNamaKategoriAttribute($value)
    // {
    //     $this->attributes['nama_kategori'] = strtoupper($value);
    // }
}