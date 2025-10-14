<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParawisataDesa extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'alamat',
        'deskripsi',
        'gambar',
        'galeri',
        'lat',
        'long'

    ];

    protected $casts = [
        'galeri' => 'array'
    ];
}
