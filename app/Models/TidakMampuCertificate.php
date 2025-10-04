<?php

namespace App\Models;

use App\Enums\CertificateStatus;
use App\Services\CertificateCodeGenerator;
use Illuminate\Database\Eloquent\Model;

class TidakMampuCertificate extends Model
{
    protected $fillable = [
        // Data diri
        'name',
        'id_card_number',
        'place_of_birth',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'religion',
        'gender',
        'profession',
        'address',

        // Data keterangan
        'used_for',

        // Lampiran persyaratan
        'attachment',

        // Status dan kode surat
        'code',
        'confirmation_status',
    ];

    protected $casts = [
        'confirmation_status' => CertificateStatus::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = CertificateCodeGenerator::generateUnique(static::class);
            }
            if (empty($model->confirmation_status)) {
                $model->confirmation_status = CertificateStatus::PENDING;
            }
        });
    }
}
