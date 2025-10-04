<?php

namespace App\Models;

use App\Enums\CertificateStatus;
use App\Services\CertificateCodeGenerator;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    protected $fillable = [
        // Data bayi
        'baby_name',
        'place_of_birth',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'hour_of_birth',
        'minute_of_birth',
        'gender',

        // Data ibu
        'mother_name',
        'mother_id_card_number',
        'mother_age',
        'mother_profession',
        'mother_address',

        // Data ayah
        'father_name',
        'father_id_card_number',
        'father_age',
        'father_profession',
        'father_address',

        // Data pelapor
        'reporter_name',
        'reporter_id_card_number',
        'reporter_age',
        'reporter_profession',
        'reporter_address',

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
