<?php

namespace App\Livewire\Guest\Penduduk;

use App\Models\Agama;

use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusKawin;
use App\Models\StatusKeluarga;
use LivewireUI\Modal\ModalComponent;

class Input extends ModalComponent
{
    public $noKk;
    public $nik;
    public $namaLengkap;
    public $jenisKelamin;
    public $tanggalLahir;
    public $statusKeluarga;
    public $statusKawin;
    public $agama;
    public $pendidikan;
    public $pekerjaan;

    protected $rules = [
        'noKk' => 'required|string|max:16',
        'nik' => 'required|string|max:16|unique:data_penduduks,nik',
        'namaLengkap' => 'required|string|max:255',
        'jenisKelamin' => 'required|in:L,P',
        'tanggalLahir' => 'required|date',
        'statusKeluarga' => 'required|string|max:100',
        'statusKawin' => 'required|string|max:50',
        'agama' => 'nullable|string|max:50',
        'pendidikan' => 'nullable|string|max:100',
        'pekerjaan' => 'nullable|string|max:100',
    ];

    protected $messages = [
        'noKk.required' => 'Nomor KK wajib diisi.',
        'noKk.max' => 'Nomor KK maksimal 16 karakter.',
        'nik.required' => 'NIK wajib diisi.',
        'nik.max' => 'NIK maksimal 16 karakter.',
        'nik.unique' => 'NIK sudah terdaftar.',
        'namaLengkap.required' => 'Nama lengkap wajib diisi.',
        'namaLengkap.max' => 'Nama lengkap maksimal 255 karakter.',
        'jenisKelamin.required' => 'Jenis kelamin wajib dipilih.',
        'jenisKelamin.in' => 'Jenis kelamin tidak valid.',
        'tanggalLahir.required' => 'Tanggal lahir wajib diisi.',
        'tanggalLahir.date' => 'Tanggal lahir tidak valid.',
        'statusKeluarga.required' => 'Hubungan dalam keluarga wajib diisi.',
        'statusKeluarga.max' => 'Hubungan dalam keluarga maksimal 100 karakter.',
        'statusKawin.required' => 'Status perkawinan wajib dipilih.',
        'statusKawin.max' => 'Status perkawinan maksimal 50 karakter.',
        'agama.max' => 'Agama maksimal 50 karakter.',
        'pendidikan.max' => 'Pendidikan terakhir maksimal 100 karakter.',
        'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
    ];

    public function mount()
    {
        $this->noKk = '0234567890123456';
        $this->nik = '1234567890123456';
        $this->namaLengkap = 'John Doe';
        $this->jenisKelamin = 'L';
        $this->tanggalLahir = '2000-01-01';
        $this->statusKeluarga = 'Anak';
        $this->statusKawin = 'Belum Menikah';
        $this->agama = 'Islam';
        $this->pendidikan = 'SMA';
        $this->pekerjaan = 'Pelajar';
    }



    public function submit()
    {
        $this->validate();
        try {

            \App\Models\DataPenduduk::create([
                'no_kk' => $this->noKk,
                'nik' => $this->nik,
                'nama_lengkap' => $this->namaLengkap,
                'jenis_kelamin' => $this->jenisKelamin,
                'tanggal_lahir' => $this->tanggalLahir,
                'status_keluarga_id' => $this->statusKeluarga,
                'status_kawin_id' => $this->statusKawin,
                'agama_id' => $this->agama,
                'pendidikan_id' => $this->pendidikan,
                'pekerjaan_id' => $this->pekerjaan,
            ]);

            $this->dispatch('openModal', 'guest.penduduk.modal');
        } catch (\Exception $e) {
            dd($e);
            $this->addError('form_error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }


    public function render()
    {
        $statusKeluargaOptions = StatusKeluarga::all();
        $statusPerkawinanOptions = StatusKawin::all();
        $agamaOptions = Agama::all();
        $pendidikanOptions = Pendidikan::all();
        $pekerjaanOptions = Pekerjaan::all();

        return view('components.penduduk.input', [
            'statusKeluargaOptions' => $statusKeluargaOptions,
            'statusPerkawinanOptions' => $statusPerkawinanOptions,
            'agamaOptions' => $agamaOptions,
            'pendidikanOptions' => $pendidikanOptions,
            'pekerjaanOptions' => $pekerjaanOptions,
        ]);
    }
}
