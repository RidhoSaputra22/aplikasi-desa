<?php

namespace App\Models;

use App\Enums\PengaduanStatus;
use Illuminate\Database\Eloquent\Model;
use App\Services\CertificateCodeGenerator;

class PengaduanMasyarakat extends Model
{
    protected $fillable = [
        'name',
        'no_hp',
        'alamat',
        'isi_laporan',
        'foto',

        // Status dan kode surat
        'code',
        'confirmation_status',
    ];

    protected $casts = [
        'confirmation_status' => PengaduanStatus::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = CertificateCodeGenerator::generateUnique(static::class);
            }
            if (empty($model->confirmation_status)) {
                $model->confirmation_status = PengaduanStatus::PENDING;
            }
        });
    }
}
