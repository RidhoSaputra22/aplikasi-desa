<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $fillable = [
        'nama_desa',
        'sejarah_desa',
        'visi',
        'misi',
        'alamat',
        'kode_pos',
        'telepon',
        'email'
    ];
}
