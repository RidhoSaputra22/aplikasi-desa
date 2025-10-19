<?php

namespace App\Models;

use App\Enums\CertificateStatus;
use App\Services\CertificateCodeGenerator;
use Illuminate\Database\Eloquent\Model;

class ParentIncomeCertificate extends Model
{
    protected $fillable = [
        'no_surat',

        // Data diri
        'name',
        'place_of_birth',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'religion',
        'profession',
        'address',

        // Data orang tua atau wali
        'parent_name',
        'parent_place_of_birth',
        'parent_day_of_birth',
        'parent_month_of_birth',
        'parent_year_of_birth',
        'parent_religion',
        'parent_profession',
        'parent_address',

        // Data keterangan penghasilan
        'nominal_income',
        'number_depandent',
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
