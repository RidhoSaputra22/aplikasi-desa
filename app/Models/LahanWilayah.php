<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LahanWilayah extends Model
{
    //
    protected $fillable = [
        'nama_lahan',
        'jenis_lahan',
        'luas_lahan',
    ];

    protected $casts = [
        'luas_lahan' => 'double',
    ];
}
