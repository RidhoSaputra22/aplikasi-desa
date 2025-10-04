<?php

/*
|--------------------------------------------------------------------------
| Certificate Code Generator Usage Examples
|--------------------------------------------------------------------------
|
| This file demonstrates how to use the certificate code generation
| helpers and classes in your Laravel application.
|
| NOTE: This is a documentation file with examples.
|       Do not include in production code.
|
*/

// Example usage in controllers, models, or anywhere in your Laravel app

// METHOD 1: Using Global Helper Functions
// =====================================

// Generate a simple certificate code
$code = generate_certificate_code();
// Output: "UXTI-UTQG-ZTEW"

// Generate a unique code for a specific model
// $uniqueCode = generate_unique_certificate_code('App\Models\BirthCertificate');

// METHOD 2: Using CertificateCodeGenerator Class
// =============================================

// use App\Services\CertificateCodeGenerator;

// Generate a simple certificate code
// $code = CertificateCodeGenerator::generate();
// Output: "UXTI-UTQG-ZTEW"

// Generate a unique code for a specific model
// $uniqueCode = CertificateCodeGenerator::generateUnique('App\Models\BirthCertificate');

// Generate multiple codes
// $codes = CertificateCodeGenerator::generateMultiple(5);
// Output: ["UXTI-UTQG-ZTEW", "ABCD-EFGH-IJKL", ...]

// Validate code format
// $isValid = CertificateCodeGenerator::isValidFormat("UXTI-UTQG-ZTEW"); // true
// $isValid = CertificateCodeGenerator::isValidFormat("invalid-code"); // false

/*
|--------------------------------------------------------------------------
| PRACTICAL IMPLEMENTATION EXAMPLES
|--------------------------------------------------------------------------
*/

// 1. In a Controller when creating a certificate
/*
use App\Services\CertificateCodeGenerator;
use App\Models\BirthCertificate;

class CertificateController extends Controller
{
    public function store(Request $request)
    {
        $certificate = BirthCertificate::create([
            'baby_name' => $request->baby_name,
            'code' => generate_certificate_code(), // Using helper function
            // or
            'code' => CertificateCodeGenerator::generateUnique(BirthCertificate::class), // Using class
            // ... other fields
        ]);
    }
}
*/

// 2. In a Model using boot method to auto-generate codes
/*
class BirthCertificate extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = CertificateCodeGenerator::generateUnique(static::class);
            }
        });
    }
}
*/

// 3. In a Livewire component
/*
class Birth extends ModalComponent
{
    public function save()
    {
        BirthCertificate::create([
            'baby_name' => $this->babyName,
            'code' => generate_certificate_code(),
            // ... other fields
        ]);
    }
}
*/
