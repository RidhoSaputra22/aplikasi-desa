<?php

namespace App\Livewire\Guest\Certificate;

use App\Models\DomisiliCertificate;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Domisili extends ModalComponent
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
    public $neighbourhood;
    public $hamlet;
    public $village;
    public $address;

    // Lampiran persyaratan
    public $attachment;

    public function mount()
    {
        if (env('APP_DEBUG')) {
            // Data diri
            $this->name = 'Andi Wijaya';
            $this->idCardNumber = '3201234567890126';
            $this->placeOfBirth = 'Bandung';
            $this->dayOfBirth = 25;
            $this->monthOfBirth = 7;
            $this->yearOfBirth = 1990;
            $this->religion = 'Islam';
            $this->gender = 'L';
            $this->profession = 'Wiraswasta';
            $this->neighbourhood = '001';
            $this->hamlet = '005';
            $this->village = 'Sumber Jaya';
            $this->address = 'Jl. Harmoni No. 234, RT 001/RW 005, Kelurahan Sumber Jaya, Kecamatan Tambun Utara, Kabupaten Bekasi, Jawa Barat';
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
        'neighbourhood' => 'required|string|min:1|max:50',
        'hamlet' => 'required|string|min:2|max:100',
        'village' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:10|max:500',

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

        'neighbourhood.required' => 'RT wajib diisi.',
        'neighbourhood.string' => 'RT harus berupa teks.',
        'neighbourhood.min' => 'RT minimal 1 karakter.',
        'neighbourhood.max' => 'RT maksimal 50 karakter.',

        'hamlet.required' => 'Dusun wajib diisi.',
        'hamlet.string' => 'Dusun harus berupa teks.',
        'hamlet.min' => 'Dusun minimal 2 karakter.',
        'hamlet.max' => 'Dusun maksimal 100 karakter.',

        'village.required' => 'Desa wajib diisi.',
        'village.string' => 'Desa harus berupa teks.',
        'village.min' => 'Desa minimal 2 karakter.',
        'village.max' => 'Desa maksimal 100 karakter.',

        'address.required' => 'Alamat lengkap wajib diisi.',
        'address.string' => 'Alamat lengkap harus berupa teks.',
        'address.min' => 'Alamat lengkap minimal 10 karakter.',
        'address.max' => 'Alamat lengkap maksimal 500 karakter.',

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
                $attachmentPath = $this->attachment->store('attachments', 'local');
            }

            // Create domisili certificate record
            DomisiliCertificate::create([
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
                'neighbourhood' => $this->neighbourhood,
                'hamlet' => $this->hamlet,
                'village' => $this->village,
                'address' => $this->address,

                // Lampiran persyaratan
                'attachment' => $attachmentPath,
            ]);

            // Show success message
            session()->flash('success', 'Surat Domisili berhasil diajukan! Kode surat akan diberikan setelah verifikasi.');

            // Reset form
            $this->reset();

            // Close modal
            $this->closeModal();
        } catch (\Exception $e) {
            // Show error message
            dd($e);
            session()->flash('error', 'Terjadi kesalahan saat mengajukan surat. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('components.surat-modal.sk-domisili');
    }
}