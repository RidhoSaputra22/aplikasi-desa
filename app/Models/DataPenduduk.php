<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    protected $fillable = [
        'no_surat',
        'no_kk',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'status_keluarga_id',
        'status_kawin_id',
        'agama_id',
        'pendidikan_id',
        'pekerjaan_id',
        'jenis_bantuan_id',
        'penghasilan_bulanan',
        'kategori_kemiskinan_id',

        'confirmation_status',
    ];

    // Define relationships if necessary
    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jenisBantuan()
    {
        return $this->belongsTo(JenisBantuan::class);
    }
    public function kategoriKemiskinan()
    {
        return $this->belongsTo(KategoriKemiskinan::class);
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function statusKawin()
    {
        return $this->belongsTo(StatusKawin::class);
    }

    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class);
    }
}
