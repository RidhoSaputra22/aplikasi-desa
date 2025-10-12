<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'gambar'
    ];
}
