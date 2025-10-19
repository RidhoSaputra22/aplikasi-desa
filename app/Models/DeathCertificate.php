<?php

namespace App\Models;

use App\Enums\CertificateStatus;
use App\Services\CertificateCodeGenerator;
use Illuminate\Database\Eloquent\Model;

class DeathCertificate extends Model
{
    protected $fillable = [
        'no_surat',

        // Data diri almarhum
        'name',
        'place_of_birth',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'religion',
        'profession',
        'address',

        // Data keterangan kematian
        'place_of_death',
        'day_of_death',
        'month_of_death',
        'year_of_death',
        'cause_of_death',

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
