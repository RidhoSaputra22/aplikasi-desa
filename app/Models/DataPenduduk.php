<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    protected $fillable = [
        'no_kk',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'hubungan_keluarga',
        'status',
        'agama',
        'pendidikan',
        'pekerjaan',

        // bantuan
        'jenis_bantuan',
        'penghasilan_bulanan',
        'kategori_kemiskinan',
    ];
}
