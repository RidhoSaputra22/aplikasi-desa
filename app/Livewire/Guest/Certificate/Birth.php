<?php

namespace App\Livewire\Guest\Certificate;

use App\Enums\CertificateType;
use App\Models\BirthCertificate;
use LivewireUI\Modal\ModalComponent;

class Birth extends ModalComponent
{

    // Data bayi
    public $babyName;
    public $placeOfBirth;
    public $dayOfBirth;
    public $monthOfBirth;
    public $yearOfBirth;
    public $hourOfBirth;
    public $minuteOfBirth;
    public $gender;

    // Data ibu
    public $motherName;
    public $motherIdCardNumber;
    public $motherAge;
    public $motherProfession;
    public $motherAddress;

    // Data ayah
    public $fatherName;
    public $fatherIdCardNumber;
    public $fatherAge;
    public $fatherProfession;
    public $fatherAddress;

    // Data pelapor
    public $reporterName;
    public $reporterIdCardNumber;
    public $reporterAge;
    public $reporterProfession;
    public $reporterAddress;

    public function mount()
    {
        if (1) {
            // Data bayi
            $this->babyName = 'Ahmad Rizki Pratama';
            $this->placeOfBirth = 'Jakarta';
            // $this->dayOfBirth = 15;
            // $this->monthOfBirth = 8;
            // $this->yearOfBirth = 2024;
            // $this->hourOfBirth = 14;
            // $this->minuteOfBirth = 30;
            $this->gender = 'L';

            // Data ibu
            $this->motherName = 'Siti Nurhaliza';
            $this->motherIdCardNumber = '3201234567890123';
            $this->motherAge = 28;
            $this->motherProfession = 'Ibu Rumah Tangga';
            $this->motherAddress = 'Jl. Merdeka No. 123, RT 001/RW 005, Kelurahan Sumber Jaya, Kecamatan Tambun Utara, Kabupaten Bekasi, Jawa Barat';

            // Data ayah
            $this->fatherName = 'Budi Santoso';
            $this->fatherIdCardNumber = '3201234567890124';
            $this->fatherAge = 32;
            $this->fatherProfession = 'Karyawan Swasta';
            $this->fatherAddress = 'Jl. Merdeka No. 123, RT 001/RW 005, Kelurahan Sumber Jaya, Kecamatan Tambun Utara, Kabupaten Bekasi, Jawa Barat';

            // Data pelapor
            $this->reporterName = 'Hasan Basri';
            $this->reporterIdCardNumber = '3201234567890125';
            $this->reporterAge = 45;
            $this->reporterProfession = 'PNS';
            $this->reporterAddress = 'Jl. Pahlawan No. 456, RT 002/RW 003, Kelurahan Maju Jaya, Kecamatan Tambun Selatan, Kabupaten Bekasi, Jawa Barat';
        }
    }

    protected $rules = [
        // Data bayi
        'babyName' => 'required|string|min:2|max:100',
        'placeOfBirth' => 'required|string|min:2|max:100',
        'dayOfBirth' => 'required|integer|min:1|max:31',
        'monthOfBirth' => 'required|integer|min:1|max:12',
        'yearOfBirth' => 'required|integer|min:1900|max:2025',
        'hourOfBirth' => 'required|integer|min:0|max:23',
        'minuteOfBirth' => 'required|integer|min:0|max:59',
        'gender' => 'required|in:L,P',

        // Data ibu
        'motherName' => 'required|string|min:2|max:100',
        'motherIdCardNumber' => 'required|string|size:16|regex:/^[0-9]+$/',
        'motherAge' => 'required|integer|min:15|max:60',
        'motherProfession' => 'required|string|min:2|max:100',
        'motherAddress' => 'required|string|min:10|max:500',

        // Data ayah
        'fatherName' => 'required|string|min:2|max:100',
        'fatherIdCardNumber' => 'required|string|size:16|regex:/^[0-9]+$/',
        'fatherAge' => 'required|integer|min:18|max:80',
        'fatherProfession' => 'required|string|min:2|max:100',
        'fatherAddress' => 'required|string|min:10|max:500',

        // Data pelapor
        'reporterName' => 'required|string|min:2|max:100',
        'reporterIdCardNumber' => 'required|string|size:16|regex:/^[0-9]+$/',
        'reporterAge' => 'required|integer|min:17|max:100',
        'reporterProfession' => 'required|string|min:2|max:100',
        'reporterAddress' => 'required|string|min:10|max:500',
    ];

    protected $messages = [
        // Data bayi
        'babyName.required' => 'Nama bayi wajib diisi.',
        'babyName.string' => 'Nama bayi harus berupa teks.',
        'babyName.min' => 'Nama bayi minimal 2 karakter.',
        'babyName.max' => 'Nama bayi maksimal 100 karakter.',

        'placeOfBirth.required' => 'Tempat lahir wajib diisi.',
        'placeOfBirth.string' => 'Tempat lahir harus berupa teks.',
        'placeOfBirth.min' => 'Tempat lahir minimal 2 karakter.',
        'placeOfBirth.max' => 'Tempat lahir maksimal 100 karakter.',

        'dayOfBirth.required' => 'Tanggal lahir wajib diisi.',
        'dayOfBirth.integer' => 'Tanggal lahir harus berupa angka.',
        'dayOfBirth.min' => 'Tanggal lahir minimal 1.',
        'dayOfBirth.max' => 'Tanggal lahir maksimal 31.',

        'monthOfBirth.required' => 'Bulan lahir wajib diisi.',
        'monthOfBirth.integer' => 'Bulan lahir harus berupa angka.',
        'monthOfBirth.min' => 'Bulan lahir minimal 1.',
        'monthOfBirth.max' => 'Bulan lahir maksimal 12.',

        'yearOfBirth.required' => 'Tahun lahir wajib diisi.',
        'yearOfBirth.integer' => 'Tahun lahir harus berupa angka.',
        'yearOfBirth.min' => 'Tahun lahir minimal 1900.',
        'yearOfBirth.max' => 'Tahun lahir maksimal 2025.',

        'hourOfBirth.required' => 'Jam lahir wajib diisi.',
        'hourOfBirth.integer' => 'Jam lahir harus berupa angka.',
        'hourOfBirth.min' => 'Jam lahir minimal 0.',
        'hourOfBirth.max' => 'Jam lahir maksimal 23.',

        'minuteOfBirth.required' => 'Menit lahir wajib diisi.',
        'minuteOfBirth.integer' => 'Menit lahir harus berupa angka.',
        'minuteOfBirth.min' => 'Menit lahir minimal 0.',
        'minuteOfBirth.max' => 'Menit lahir maksimal 59.',

        'gender.required' => 'Jenis kelamin wajib dipilih.',
        'gender.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',

        // Data ibu
        'motherName.required' => 'Nama ibu wajib diisi.',
        'motherName.string' => 'Nama ibu harus berupa teks.',
        'motherName.min' => 'Nama ibu minimal 2 karakter.',
        'motherName.max' => 'Nama ibu maksimal 100 karakter.',

        'motherIdCardNumber.required' => 'NIK ibu wajib diisi.',
        'motherIdCardNumber.size' => 'NIK ibu harus 16 digit.',
        'motherIdCardNumber.regex' => 'NIK ibu harus berupa angka.',

        'motherAge.required' => 'Umur ibu wajib diisi.',
        'motherAge.integer' => 'Umur ibu harus berupa angka.',
        'motherAge.min' => 'Umur ibu minimal 15 tahun.',
        'motherAge.max' => 'Umur ibu maksimal 60 tahun.',

        'motherProfession.required' => 'Pekerjaan ibu wajib diisi.',
        'motherProfession.string' => 'Pekerjaan ibu harus berupa teks.',
        'motherProfession.min' => 'Pekerjaan ibu minimal 2 karakter.',
        'motherProfession.max' => 'Pekerjaan ibu maksimal 100 karakter.',

        'motherAddress.required' => 'Alamat ibu wajib diisi.',
        'motherAddress.string' => 'Alamat ibu harus berupa teks.',
        'motherAddress.min' => 'Alamat ibu minimal 10 karakter.',
        'motherAddress.max' => 'Alamat ibu maksimal 500 karakter.',

        // Data ayah
        'fatherName.required' => 'Nama ayah wajib diisi.',
        'fatherName.string' => 'Nama ayah harus berupa teks.',
        'fatherName.min' => 'Nama ayah minimal 2 karakter.',
        'fatherName.max' => 'Nama ayah maksimal 100 karakter.',

        'fatherIdCardNumber.required' => 'NIK ayah wajib diisi.',
        'fatherIdCardNumber.size' => 'NIK ayah harus 16 digit.',
        'fatherIdCardNumber.regex' => 'NIK ayah harus berupa angka.',

        'fatherAge.required' => 'Umur ayah wajib diisi.',
        'fatherAge.integer' => 'Umur ayah harus berupa angka.',
        'fatherAge.min' => 'Umur ayah minimal 18 tahun.',
        'fatherAge.max' => 'Umur ayah maksimal 80 tahun.',

        'fatherProfession.required' => 'Pekerjaan ayah wajib diisi.',
        'fatherProfession.string' => 'Pekerjaan ayah harus berupa teks.',
        'fatherProfession.min' => 'Pekerjaan ayah minimal 2 karakter.',
        'fatherProfession.max' => 'Pekerjaan ayah maksimal 100 karakter.',

        'fatherAddress.required' => 'Alamat ayah wajib diisi.',
        'fatherAddress.string' => 'Alamat ayah harus berupa teks.',
        'fatherAddress.min' => 'Alamat ayah minimal 10 karakter.',
        'fatherAddress.max' => 'Alamat ayah maksimal 500 karakter.',

        // Data pelapor
        'reporterName.required' => 'Nama pelapor wajib diisi.',
        'reporterName.string' => 'Nama pelapor harus berupa teks.',
        'reporterName.min' => 'Nama pelapor minimal 2 karakter.',
        'reporterName.max' => 'Nama pelapor maksimal 100 karakter.',

        'reporterIdCardNumber.required' => 'NIK pelapor wajib diisi.',
        'reporterIdCardNumber.size' => 'NIK pelapor harus 16 digit.',
        'reporterIdCardNumber.regex' => 'NIK pelapor harus berupa angka.',

        'reporterAge.required' => 'Umur pelapor wajib diisi.',
        'reporterAge.integer' => 'Umur pelapor harus berupa angka.',
        'reporterAge.min' => 'Umur pelapor minimal 17 tahun.',
        'reporterAge.max' => 'Umur pelapor maksimal 100 tahun.',

        'reporterProfession.required' => 'Pekerjaan pelapor wajib diisi.',
        'reporterProfession.string' => 'Pekerjaan pelapor harus berupa teks.',
        'reporterProfession.min' => 'Pekerjaan pelapor minimal 2 karakter.',
        'reporterProfession.max' => 'Pekerjaan pelapor maksimal 100 karakter.',

        'reporterAddress.required' => 'Alamat pelapor wajib diisi.',
        'reporterAddress.string' => 'Alamat pelapor harus berupa teks.',
        'reporterAddress.min' => 'Alamat pelapor minimal 10 karakter.',
        'reporterAddress.max' => 'Alamat pelapor maksimal 500 karakter.',
    ];

    public function submit()
    {
        // Validate all inputs
        $this->validate();

        try {
            // Create birth certificate record
            $birthCertificate = BirthCertificate::create([
                // Data bayi
                'baby_name' => $this->babyName,
                'place_of_birth' => $this->placeOfBirth,
                'day_of_birth' => $this->dayOfBirth,
                'month_of_birth' => $this->monthOfBirth,
                'year_of_birth' => $this->yearOfBirth,
                'hour_of_birth' => $this->hourOfBirth,
                'minute_of_birth' => $this->minuteOfBirth,
                'gender' => $this->gender,

                // Data ibu
                'mother_name' => $this->motherName,
                'mother_id_card_number' => $this->motherIdCardNumber,
                'mother_age' => $this->motherAge,
                'mother_profession' => $this->motherProfession,
                'mother_address' => $this->motherAddress,

                // Data ayah
                'father_name' => $this->fatherName,
                'father_id_card_number' => $this->fatherIdCardNumber,
                'father_age' => $this->fatherAge,
                'father_profession' => $this->fatherProfession,
                'father_address' => $this->fatherAddress,

                // Data pelapor
                'reporter_name' => $this->reporterName,
                'reporter_id_card_number' => $this->reporterIdCardNumber,
                'reporter_age' => $this->reporterAge,
                'reporter_profession' => $this->reporterProfession,
                'reporter_address' => $this->reporterAddress,
            ]);


            // Close modal
            $this->dispatch('openModal', 'guest.certificate.confirmModal', ['code' => $birthCertificate->code, 'jenis' => CertificateType::KELAHIRAN->value]);
        } catch (\Exception $e) {
            // Show error message
            session()->flash('error', 'Terjadi kesalahan saat mengajukan surat. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('components.surat-modal.sk-kelahiran');
    }
}
