<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParawisataDesa extends Model
{
    protected $fillable = [
        'title',
        'deskripsi',
        'gambar',
        'galeri'
    ];

    protected $casts = [
        'galeri' => 'array'
    ];
}
