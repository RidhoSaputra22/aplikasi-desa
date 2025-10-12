<?php

namespace App\Livewire\Guest\Certificate;

use Livewire\WithFileUploads;
use App\Enums\CertificateType;
use App\Models\UsahaCertificate;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;

class Usaha extends ModalComponent
{
    use WithFileUploads;
    // Data diri properties
    public $name;
    public $idCardNumber;
    public $placeOfBirth;
    public $dayOfBirth;
    public $monthOfBirth;
    public $yearOfBirth;
    public $religion;
    public $gender;
    public $profession;
    public $address;

    // Data keterangan properties
    public $businessType;
    public $usedFor;

    // Lampiran persyaratan properties
    public $attachment;

    public function mount()
    {
        if (env('APP_DEBUG')) {
            // Data diri
            $this->name = 'Bambang Sutrisno';
            $this->idCardNumber = '3201234567890128';
            $this->placeOfBirth = 'Semarang';
            $this->dayOfBirth = 5;
            $this->monthOfBirth = 12;
            $this->yearOfBirth = 1980;
            $this->religion = 'Islam';
            $this->gender = 'L';
            $this->profession = 'Wiraswasta';
            $this->address = 'Jl. Dagang No. 456, RT 003/RW 007, Kelurahan Bisnis Center, Kecamatan Tambun Timur, Kabupaten Bekasi, Jawa Barat';

            // Data keterangan
            $this->businessType = 'Warung Makan dan Katering';
            $this->usedFor = 'Pengajuan izin usaha mikro dan perizinan BPOM';
        }
    }

    protected $rules = [
        // Data diri
        'name' => 'required|string|min:2|max:100',
        'idCardNumber' => 'required|string|size:16|regex:/^[0-9]+$/',
        'placeOfBirth' => 'required|string|min:2|max:100',
        'dayOfBirth' => 'required|integer|min:1|max:31',
        'monthOfBirth' => 'required|integer|min:1|max:12',
        'yearOfBirth' => 'required|integer|min:1900|max:2025',
        'religion' => 'required|string|min:2|max:50',
        'gender' => 'required|in:L,P',
        'profession' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:10|max:500',

        // Data keterangan
        'businessType' => 'required|string|min:5|max:100',
        'usedFor' => 'required|string|min:5|max:200',

        // Lampiran persyaratan
        'attachment' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    protected $messages = [
        // Data diri
        'name.required' => 'Nama lengkap wajib diisi.',
        'name.string' => 'Nama lengkap harus berupa teks.',
        'name.min' => 'Nama lengkap minimal 2 karakter.',
        'name.max' => 'Nama lengkap maksimal 100 karakter.',

        'idCardNumber.required' => 'NIK wajib diisi.',
        'idCardNumber.size' => 'NIK harus 16 digit.',
        'idCardNumber.regex' => 'NIK harus berupa angka.',

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

        'religion.required' => 'Agama wajib diisi.',
        'religion.string' => 'Agama harus berupa teks.',
        'religion.min' => 'Agama minimal 2 karakter.',
        'religion.max' => 'Agama maksimal 50 karakter.',

        'gender.required' => 'Jenis kelamin wajib dipilih.',
        'gender.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',

        'profession.required' => 'Pekerjaan wajib diisi.',
        'profession.string' => 'Pekerjaan harus berupa teks.',
        'profession.min' => 'Pekerjaan minimal 2 karakter.',
        'profession.max' => 'Pekerjaan maksimal 100 karakter.',

        'address.required' => 'Alamat lengkap wajib diisi.',
        'address.string' => 'Alamat lengkap harus berupa teks.',
        'address.min' => 'Alamat lengkap minimal 10 karakter.',
        'address.max' => 'Alamat lengkap maksimal 500 karakter.',

        // Business type
        'businessType.required' => 'Jenis usaha wajib diisi.',
        'businessType.string' => 'Jenis usaha harus berupa teks.',
        'businessType.min' => 'Jenis usaha minimal 5 karakter.',
        'businessType.max' => 'Jenis usaha maksimal 100 karakter.',

        // Data keterangan
        'usedFor.required' => 'Kegunaan usaha wajib diisi.',
        'usedFor.string' => 'Kegunaan usaha harus berupa teks.',
        'usedFor.min' => 'Kegunaan usaha minimal 5 karakter.',
        'usedFor.max' => 'Kegunaan usaha maksimal 200 karakter.',

        // Lampiran persyaratan
        'attachment.required' => 'Lampiran wajib diunggah.',
        'attachment.file' => 'Lampiran harus berupa file.',
        'attachment.mimes' => 'Lampiran harus berformat PDF, JPG, JPEG, atau PNG.',
        'attachment.max' => 'Ukuran lampiran maksimal 2MB.',
    ];

    public function submit()
    {
        // Validate all inputs
        $this->validate();

        try {
            // Handle file upload if attachment exists
            $attachmentPath = null;
            if ($this->attachment) {
                $attachmentPath = $this->attachment->store('certificates/usaha', 'local');
            }

            // Create usaha certificate record
            $usahaCert = UsahaCertificate::create([
                // Data diri
                'name' => $this->name,
                'id_card_number' => $this->idCardNumber,
                'place_of_birth' => $this->placeOfBirth,
                'day_of_birth' => $this->dayOfBirth,
                'month_of_birth' => $this->monthOfBirth,
                'year_of_birth' => $this->yearOfBirth,
                'religion' => $this->religion,
                'gender' => $this->gender,
                'profession' => $this->profession,
                'address' => $this->address,

                // Data keterangan
                'business_type' => $this->businessType,
                'used_for' => $this->usedFor,

                // Lampiran persyaratan
                'attachment' => $attachmentPath,
            ]);

            // Close modal
            $this->dispatch('openModal', 'guest.certificate.confirmModal', ['code' => $usahaCert->code, 'jenis' => CertificateType::USAHA->value]);
        } catch (\Exception $e) {
            // Show error message
            session()->flash('error', 'Terjadi kesalahan saat mengajukan surat. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('components.surat-modal.sk-usaha');
    }
}
