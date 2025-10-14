<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    //
    protected $fillable = [
        'nama_sarana',
        'jenis_sarana',
        'kondisi_sarana',
        'kapasitas_sarana',
        'lokasi_sarana',
        'foto_sarana',
        'keterangan',
    ];
}
