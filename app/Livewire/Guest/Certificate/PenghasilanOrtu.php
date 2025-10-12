<?php

namespace App\Livewire\Guest\Certificate;

use Livewire\WithFileUploads;
use App\Enums\CertificateType;
use LivewireUI\Modal\ModalComponent;
use App\Models\ParentIncomeCertificate;
use Illuminate\Support\Facades\Storage;

class PenghasilanOrtu extends ModalComponent
{

    use WithFileUploads;

    // Data diri
    public $name;
    public $placeOfBirth;
    public $dayOfBirth;
    public $monthOfBirth;
    public $yearOfBirth;
    public $religion;
    public $profession;
    public $address;

    // Data orang tua atau wali
    public $parentName;
    public $parentPlaceOfBirth;
    public $parentDayOfBirth;
    public $parentMonthOfBirth;
    public $parentYearOfBirth;
    public $parentReligion;
    public $parentProfession;
    public $parentAddress;

    // Data keterangan penghasilan
    public $nominalIncome;
    public $numberDepandent;
    public $usedFor;

    // Lampiran persyaratan
    public $attachment;

    public function mount()
    {
        if (env('APP_DEBUG')) {
            // Data diri
            $this->name = 'Fitri Handayani';
            $this->placeOfBirth = 'Medan';
            $this->dayOfBirth = 12;
            $this->monthOfBirth = 11;
            $this->yearOfBirth = 2005;
            $this->religion = 'Islam';
            $this->profession = 'Mahasiswa';
            $this->address = 'Jl. Pendidikan No. 567, RT 004/RW 002, Kelurahan Cendana Asri, Kecamatan Tambun Selatan, Kabupaten Bekasi, Jawa Barat';

            // Data orang tua atau wali
            $this->parentName = 'Dedi Handayani';
            $this->parentPlaceOfBirth = 'Medan';
            $this->parentDayOfBirth = 8;
            $this->parentMonthOfBirth = 5;
            $this->parentYearOfBirth = 1975;
            $this->parentReligion = 'Islam';
            $this->parentProfession = 'Guru';
            $this->parentAddress = 'Jl. Pendidikan No. 567, RT 004/RW 002, Kelurahan Cendana Asri, Kecamatan Tambun Selatan, Kabupaten Bekasi, Jawa Barat';

            // Data keterangan penghasilan
            $this->nominalIncome = 5500000;
            $this->numberDepandent = 3;
            $this->usedFor = 'Pengajuan beasiswa kuliah';
        }
    }

    protected $rules = [
        // Data diri
        'name' => 'required|string|min:2|max:100',
        'placeOfBirth' => 'required|string|min:2|max:100',
        'dayOfBirth' => 'required|integer|min:1|max:31',
        'monthOfBirth' => 'required|integer|min:1|max:12',
        'yearOfBirth' => 'required|integer|min:1900|max:2025',
        'religion' => 'required|string|min:2|max:50',
        'profession' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:10|max:500',

        // Data orang tua atau wali
        'parentName' => 'required|string|min:2|max:100',
        'parentPlaceOfBirth' => 'required|string|min:2|max:100',
        'parentDayOfBirth' => 'required|integer|min:1|max:31',
        'parentMonthOfBirth' => 'required|integer|min:1|max:12',
        'parentYearOfBirth' => 'required|integer|min:1900|max:2024',
        'parentReligion' => 'required|string|min:2|max:50',
        'parentProfession' => 'required|string|min:2|max:100',
        'parentAddress' => 'required|string|min:10|max:500',

        // Data keterangan penghasilan
        'nominalIncome' => 'required|numeric|min:0|max:999999999',
        'numberDepandent' => 'required|integer|min:0|max:20',
        'usedFor' => 'required|string|min:5|max:200',

        // Lampiran persyaratan
        'attachment' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    protected $messages = [
        // Data diri
        'name.required' => 'Nama pemohon wajib diisi.',
        'name.string' => 'Nama pemohon harus berupa teks.',
        'name.min' => 'Nama pemohon minimal 2 karakter.',
        'name.max' => 'Nama pemohon maksimal 100 karakter.',

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

        'profession.required' => 'Pekerjaan wajib diisi.',
        'profession.string' => 'Pekerjaan harus berupa teks.',
        'profession.min' => 'Pekerjaan minimal 2 karakter.',
        'profession.max' => 'Pekerjaan maksimal 100 karakter.',

        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
        'address.min' => 'Alamat minimal 10 karakter.',
        'address.max' => 'Alamat maksimal 500 karakter.',

        // Data orang tua atau wali
        'parentName.required' => 'Nama orang tua/wali wajib diisi.',
        'parentName.string' => 'Nama orang tua/wali harus berupa teks.',
        'parentName.min' => 'Nama orang tua/wali minimal 2 karakter.',
        'parentName.max' => 'Nama orang tua/wali maksimal 100 karakter.',

        'parentPlaceOfBirth.required' => 'Tempat lahir orang tua/wali wajib diisi.',
        'parentPlaceOfBirth.string' => 'Tempat lahir orang tua/wali harus berupa teks.',
        'parentPlaceOfBirth.min' => 'Tempat lahir orang tua/wali minimal 2 karakter.',
        'parentPlaceOfBirth.max' => 'Tempat lahir orang tua/wali maksimal 100 karakter.',

        'parentDayOfBirth.required' => 'Tanggal lahir orang tua/wali wajib diisi.',
        'parentDayOfBirth.integer' => 'Tanggal lahir orang tua/wali harus berupa angka.',
        'parentDayOfBirth.min' => 'Tanggal lahir orang tua/wali minimal 1.',
        'parentDayOfBirth.max' => 'Tanggal lahir orang tua/wali maksimal 31.',

        'parentMonthOfBirth.required' => 'Bulan lahir orang tua/wali wajib diisi.',
        'parentMonthOfBirth.integer' => 'Bulan lahir orang tua/wali harus berupa angka.',
        'parentMonthOfBirth.min' => 'Bulan lahir orang tua/wali minimal 1.',
        'parentMonthOfBirth.max' => 'Bulan lahir orang tua/wali maksimal 12.',

        'parentYearOfBirth.required' => 'Tahun lahir orang tua/wali wajib diisi.',
        'parentYearOfBirth.integer' => 'Tahun lahir orang tua/wali harus berupa angka.',
        'parentYearOfBirth.min' => 'Tahun lahir orang tua/wali minimal 1900.',
        'parentYearOfBirth.max' => 'Tahun lahir orang tua/wali maksimal 2024.',

        'parentReligion.required' => 'Agama orang tua/wali wajib diisi.',
        'parentReligion.string' => 'Agama orang tua/wali harus berupa teks.',
        'parentReligion.min' => 'Agama orang tua/wali minimal 2 karakter.',
        'parentReligion.max' => 'Agama orang tua/wali maksimal 50 karakter.',

        'parentProfession.required' => 'Pekerjaan orang tua/wali wajib diisi.',
        'parentProfession.string' => 'Pekerjaan orang tua/wali harus berupa teks.',
        'parentProfession.min' => 'Pekerjaan orang tua/wali minimal 2 karakter.',
        'parentProfession.max' => 'Pekerjaan orang tua/wali maksimal 100 karakter.',

        'parentAddress.required' => 'Alamat orang tua/wali wajib diisi.',
        'parentAddress.string' => 'Alamat orang tua/wali harus berupa teks.',
        'parentAddress.min' => 'Alamat orang tua/wali minimal 10 karakter.',
        'parentAddress.max' => 'Alamat orang tua/wali maksimal 500 karakter.',

        // Data keterangan penghasilan
        'nominalIncome.required' => 'Nominal penghasilan wajib diisi.',
        'nominalIncome.numeric' => 'Nominal penghasilan harus berupa angka.',
        'nominalIncome.min' => 'Nominal penghasilan minimal 0.',
        'nominalIncome.max' => 'Nominal penghasilan terlalu besar.',

        'numberDepandent.required' => 'Jumlah tanggungan wajib diisi.',
        'numberDepandent.integer' => 'Jumlah tanggungan harus berupa angka.',
        'numberDepandent.min' => 'Jumlah tanggungan minimal 0.',
        'numberDepandent.max' => 'Jumlah tanggungan maksimal 20.',

        'usedFor.required' => 'Kegunaan surat wajib diisi.',
        'usedFor.string' => 'Kegunaan surat harus berupa teks.',
        'usedFor.min' => 'Kegunaan surat minimal 5 karakter.',
        'usedFor.max' => 'Kegunaan surat maksimal 200 karakter.',

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
                $attachmentPath = $this->attachment->store('certificates/parent-income', 'local');
            }

            // Create parent income certificate record
            $ParentIncomeCert = ParentIncomeCertificate::create([
                // Data diri
                'name' => $this->name,
                'place_of_birth' => $this->placeOfBirth,
                'day_of_birth' => $this->dayOfBirth,
                'month_of_birth' => $this->monthOfBirth,
                'year_of_birth' => $this->yearOfBirth,
                'religion' => $this->religion,
                'profession' => $this->profession,
                'address' => $this->address,

                // Data orang tua atau wali
                'parent_name' => $this->parentName,
                'parent_place_of_birth' => $this->parentPlaceOfBirth,
                'parent_day_of_birth' => $this->parentDayOfBirth,
                'parent_month_of_birth' => $this->parentMonthOfBirth,
                'parent_year_of_birth' => $this->parentYearOfBirth,
                'parent_religion' => $this->parentReligion,
                'parent_profession' => $this->parentProfession,
                'parent_address' => $this->parentAddress,

                // Data keterangan penghasilan
                'nominal_income' => $this->nominalIncome,
                'number_depandent' => $this->numberDepandent,
                'used_for' => $this->usedFor,

                // Lampiran persyaratan
                'attachment' => $attachmentPath,
            ]);

            // Close modal
            $this->dispatch('openModal', 'guest.certificate.confirmModal', ['code' => $ParentIncomeCert->code, 'jenis' => CertificateType::PENGHASILAN_ORANG_TUA->value]);
        } catch (\Exception $e) {
            // Show error message
            session()->flash('error', 'Terjadi kesalahan saat mengajukan surat. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('components.surat-modal.sk-penghasilan-orangtua');
    }
}
