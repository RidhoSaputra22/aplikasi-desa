<?php

namespace App\Livewire\Guest\Penduduk;

use App\Models\Agama;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusKawin;
use App\Models\JenisBantuan;
use App\Models\KategoriKemiskinan;
use App\Models\StatusKeluarga;
use LivewireUI\Modal\ModalComponent;

class Input extends ModalComponent
{
    public $link;

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
    public $bantuan;
    public $kemiskinan;
    public $pemasukanBulanan;


    protected $rules = [
        'noKk' => 'required|string|max:16',
        'nik' => 'required|string|max:16|unique:data_penduduks,nik',
        'namaLengkap' => 'required|string|max:255',
        'jenisKelamin' => 'required|in:L,P',
        'tanggalLahir' => 'required|date',
        'statusKeluarga' => 'required|integer|max:100',
        'statusKawin' => 'required|integer|max:50',
        'agama' => 'required|integer|max:50',
        'pendidikan' => 'required|integer|max:100',
        'pekerjaan' => 'required|integer|max:100',
        'bantuan' => 'required|integer|exists:jenis_bantuans,id',
        'kemiskinan' => 'required|integer|exists:kategori_kemiskinans,id',
        'pemasukanBulanan' => 'required|numeric|min:0'
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
        'agama.required' => 'Agama wajib dipilih.',
        'agama.max' => 'Agama maksimal 50 karakter.',
        'pendidikan.required' => 'Pendidikan terakhir wajib dipilih.',
        'pendidikan.max' => 'Pendidikan terakhir maksimal 100 karakter.',
        'pekerjaan.required' => 'Pekerjaan wajib dipilih.',
        'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
        'bantuan.required' => 'Bantuan wajib dipilih.',
        'bantuan.integer' => 'Bantuan tidak valid.',
        'bantuan.exists' => 'Bantuan tidak ditemukan.',
        'kemiskinan.required' => 'Kategori kemiskinan wajib dipilih.',
        'kemiskinan.integer' => 'Kategori kemiskinan tidak valid.',
        'kemiskinan.exists' => 'Kategori kemiskinan tidak ditemukan.',
        'pemasukanBulanan.required' => 'pemasukan bulanan wajib diisi.',
        'pemasukanBulanan.numeric' => 'pemasukan bulanan harus berupa angka.',
        'pemasukanBulanan.min' => 'pemasukan bulanan tidak boleh kurang dari 0.'
    ];

    public function mount($link)
    {
        $this->link = $link;
        // Generate random data for all inputs
        $this->noKk = str_pad(rand(1000000000000000, 9999999999999999), 16, '0', STR_PAD_LEFT);
        $this->nik = str_pad(rand(1000000000000000, 9999999999999999), 16, '0', STR_PAD_LEFT);
        $this->namaLengkap = $this->generateRandomName();
        $this->jenisKelamin = rand(0, 1) ? 'L' : 'P';
        $this->tanggalLahir = date('Y-m-d', rand(strtotime('1950-01-01'), strtotime('2005-12-31')));
        $this->statusKeluarga = StatusKeluarga::inRandomOrder()->first()->id;
        $this->statusKawin = StatusKawin::inRandomOrder()->first()->id;
        $this->agama = Agama::inRandomOrder()->first()->id;
        $this->pendidikan = Pendidikan::inRandomOrder()->first()->id;
        $this->pekerjaan = Pekerjaan::inRandomOrder()->first()->id;
        $this->bantuan = JenisBantuan::inRandomOrder()->first()->id;
        $this->kemiskinan = KategoriKemiskinan::inRandomOrder()->first()->id;
        $this->pemasukanBulanan = rand(500000, 10000000);
    }

    private function generateRandomName()
    {
        $firstNames = ['Ahmad', 'Budi', 'Siti', 'Dewi', 'Andi', 'Maya', 'Rizki', 'Indah', 'Fajar', 'Lestari'];
        $lastNames = ['Santoso', 'Wijaya', 'Kusuma', 'Pratama', 'Sari', 'Putra', 'Wati', 'Hakim', 'Firmansyah', 'Maharani'];

        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
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
                'jenis_bantuan_id' => $this->bantuan,
                'kategori_kemiskinan_id' => $this->kemiskinan,
                'penghasilan_bulanan' => $this->pemasukanBulanan,
            ]);
            $this->dispatch('openModal', 'guest.penduduk.modal', ['link' => $this->link]);
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
        $jenisBantuan = JenisBantuan::all();
        $kemiskinanOptions = KategoriKemiskinan::all();
        $link = $this->link;

        // dd(KategoriKemiskinan::all());
        // dd($jenisBantuan);

        return view('components.penduduk.input', compact(
            'link',
            'statusKeluargaOptions',
            'statusPerkawinanOptions',
            'agamaOptions',
            'pendidikanOptions',
            'pekerjaanOptions',
            'jenisBantuan',
            'kemiskinanOptions',
        ));
    }
}