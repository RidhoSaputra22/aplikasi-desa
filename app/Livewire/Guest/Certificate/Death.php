<?php

namespace App\Livewire\Guest\Certificate;

use App\Models\DeathCertificate;
use LivewireUI\Modal\ModalComponent;

class Death extends ModalComponent
{

    public $name;
    public $placeOfBirth;
    public $dayOfBirth;
    public $monthOfBirth;
    public $yearOfBirth;
    public $religion;
    public $profession;
    public $address;

    // Data keterangan kematian properties
    public $placeOfDeath;
    public $dayOfDeath;
    public $monthOfDeath;
    public $yearOfDeath;
    public $causeOfDeath;

    public function mount()
    {
        if (env('APP_DEBUG')) {
            // Data diri almarhum
            $this->name = 'Slamet Riyadi';
            $this->placeOfBirth = 'Surabaya';
            $this->dayOfBirth = 10;
            $this->monthOfBirth = 3;
            $this->yearOfBirth = 1955;
            $this->religion = 'Islam';
            $this->profession = 'Pensiunan PNS';
            $this->address = 'Jl. Mawar No. 89, RT 003/RW 008, Kelurahan Sumber Makmur, Kecamatan Tambun Tengah, Kabupaten Bekasi, Jawa Barat';

            // Data keterangan kematian
            $this->placeOfDeath = 'RS Umum Bekasi';
            $this->dayOfDeath = 2;
            $this->monthOfDeath = 10;
            $this->yearOfDeath = 2024;
            $this->causeOfDeath = 'Sakit jantung dan komplikasi diabetes';
        }
    }

    protected $rules = [
        // Data diri almarhum
        'name' => 'required|string|min:2|max:100',
        'placeOfBirth' => 'required|string|min:2|max:100',
        'dayOfBirth' => 'required|integer|min:1|max:31',
        'monthOfBirth' => 'required|integer|min:1|max:12',
        'yearOfBirth' => 'required|integer|min:1900|max:2024',
        'religion' => 'required|string|min:2|max:50',
        'profession' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:10|max:500',

        // Data keterangan kematian
        'placeOfDeath' => 'required|string|min:2|max:100',
        'dayOfDeath' => 'required|integer|min:1|max:31',
        'monthOfDeath' => 'required|integer|min:1|max:12',
        'yearOfDeath' => 'required|integer|min:1900|max:2025',
        'causeOfDeath' => 'required|string|min:5|max:200',
    ];

    protected $messages = [
        // Data diri almarhum
        'name.required' => 'Nama almarhum wajib diisi.',
        'name.string' => 'Nama almarhum harus berupa teks.',
        'name.min' => 'Nama almarhum minimal 2 karakter.',
        'name.max' => 'Nama almarhum maksimal 100 karakter.',

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
        'yearOfBirth.max' => 'Tahun lahir maksimal 2024.',

        'religion.required' => 'Agama wajib diisi.',
        'religion.string' => 'Agama harus berupa teks.',
        'religion.min' => 'Agama minimal 2 karakter.',
        'religion.max' => 'Agama maksimal 50 karakter.',

        'profession.required' => 'Pekerjaan wajib diisi.',
        'profession.string' => 'Pekerjaan harus berupa teks.',
        'profession.min' => 'Pekerjaan minimal 2 karakter.',
        'profession.max' => 'Pekerjaan maksimal 100 karakter.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
        'address.min' => 'Alamat minimal 10 karakter.',
        'address.max' => 'Alamat maksimal 500 karakter.',

        // Data keterangan kematian
        'placeOfDeath.required' => 'Tempat meninggal wajib diisi.',
        'placeOfDeath.string' => 'Tempat meninggal harus berupa teks.',
        'placeOfDeath.min' => 'Tempat meninggal minimal 2 karakter.',
        'placeOfDeath.max' => 'Tempat meninggal maksimal 100 karakter.',

        'dayOfDeath.required' => 'Tanggal meninggal wajib diisi.',
        'dayOfDeath.integer' => 'Tanggal meninggal harus berupa angka.',
        'dayOfDeath.min' => 'Tanggal meninggal minimal 1.',
        'dayOfDeath.max' => 'Tanggal meninggal maksimal 31.',

        'monthOfDeath.required' => 'Bulan meninggal wajib diisi.',
        'monthOfDeath.integer' => 'Bulan meninggal harus berupa angka.',
        'monthOfDeath.min' => 'Bulan meninggal minimal 1.',
        'monthOfDeath.max' => 'Bulan meninggal maksimal 12.',

        'yearOfDeath.required' => 'Tahun meninggal wajib diisi.',
        'yearOfDeath.integer' => 'Tahun meninggal harus berupa angka.',
        'yearOfDeath.min' => 'Tahun meninggal minimal 1900.',
        'yearOfDeath.max' => 'Tahun meninggal maksimal 2025.',

        'causeOfDeath.required' => 'Sebab kematian wajib diisi.',
        'causeOfDeath.string' => 'Sebab kematian harus berupa teks.',
        'causeOfDeath.min' => 'Sebab kematian minimal 5 karakter.',
        'causeOfDeath.max' => 'Sebab kematian maksimal 200 karakter.',
    ];

    public function submit()
    {
        // Validate all inputs
        $this->validate();

        try {
            // Create death certificate record
            $deathCert = DeathCertificate::create([
                // Data diri almarhum
                'name' => $this->name,
                'place_of_birth' => $this->placeOfBirth,
                'day_of_birth' => $this->dayOfBirth,
                'month_of_birth' => $this->monthOfBirth,
                'year_of_birth' => $this->yearOfBirth,
                'religion' => $this->religion,
                'profession' => $this->profession,
                'address' => $this->address,

                // Data keterangan kematian
                'place_of_death' => $this->placeOfDeath,
                'day_of_death' => $this->dayOfDeath,
                'month_of_death' => $this->monthOfDeath,
                'year_of_death' => $this->yearOfDeath,
                'cause_of_death' => $this->causeOfDeath,
            ]);


            // Close modal
            $this->dispatch('openModal', 'guest.certificate.confirmModal', ['code' => $deathCert->code]);
        } catch (\Exception $e) {
            // Show error message
            session()->flash('error', 'Terjadi kesalahan saat mengajukan surat. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('components.surat-modal.sk-kematian');
    }
}
