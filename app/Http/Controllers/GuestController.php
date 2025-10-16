<?php

namespace App\Http\Controllers;

use App\Models\UmkmDesa;
use App\Models\ProfilDesa;
use App\Models\AparaturDesa;
use App\Models\DataPenduduk;
use App\Models\KategoriKemiskinan;
use App\Models\LahanWilayah;
use Illuminate\Http\Request;
use App\Models\ParawisataDesa;
use App\Models\SaranaPrasarana;

class GuestController extends Controller
{
    //
    public function welcome()
    {
        $latest = \App\Models\BeritaDesa::latest()->take(4)->get();
        $parawisata = ParawisataDesa::inRandomOrder()->take(3)->get();
        $umkm = UmkmDesa::with('kategoriUmkm')->take(4)->get();

        return view('welcome', compact('latest', 'parawisata', 'umkm'));
    }

    public function publikasi()
    {
        $latest = \App\Models\BeritaDesa::latest()->take(4)->get();
        $data = \App\Models\BeritaDesa::inRandomOrder()->paginate(6);

        return view('publikasi', compact('latest', 'data'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function profilDesa()
    {
        $profil = ProfilDesa::first();
        $aparaturDesa = AparaturDesa::all();
        return view('profil-desa', compact('profil', 'aparaturDesa'));
    }

    public function parawisata()
    {
        $data = ParawisataDesa::all();
        return view('parawisata', compact('data'));
    }

    public function parawisataDetail($slug)
    {
        $data = ParawisataDesa::where('slug', $slug)->firstOrFail();
        return view('parawisata.detail', compact('data'));
    }

    public function dataDesa()
    {
        // === Statistik Penduduk Berdasarkan Jenis Kelamin ===
        $pendudukByGender = DataPenduduk::selectRaw('jenis_kelamin, COUNT(*) as total')
            ->groupBy('jenis_kelamin')
            ->get();

        // === Statistik Penduduk Berdasarkan Pekerjaan ===
        $pendudukByPekerjaan = DataPenduduk::selectRaw('pekerjaan_id, COUNT(*) as total, (SELECT nama_pekerjaan FROM pekerjaans WHERE pekerjaans.id = data_penduduks.pekerjaan_id) as label')
            ->groupBy('pekerjaan_id')
            ->get();

        // === Statistik Penduduk Berdasarkan Pendidikan ===
        $pendudukByPendidikan = DataPenduduk::selectRaw('pendidikan_id, COUNT(*) as total, (SELECT nama_pendidikan FROM pendidikans WHERE pendidikans.id = data_penduduks.pendidikan_id) as label')
            ->groupBy('pendidikan_id')
            ->get();

        // === Statistik Penduduk Berdasarkan Kategori Kemiskinan ===
        $pendudukByKemiskinan = DataPenduduk::selectRaw('kategori_kemiskinan_id, COUNT(*) as total')
            ->groupBy('kategori_kemiskinan_id')
            ->get();

        $pendudukByUsia = DataPenduduk::selectRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) AS usia, COUNT(*) as total')
            ->groupBy('usia')
            ->get();

        $pendudukByStatusKawin = DataPenduduk::selectRaw('status_kawin_id, COUNT(*) as total, (SELECT nama_status FROM status_kawins WHERE status_kawins.id = data_penduduks.status_kawin_id) as label')
            ->groupBy('status_kawin_id')
            ->get();

        $jumlahKK = DataPenduduk::count('no_kk');
        $jumlahPenduduk = DataPenduduk::count();
        $lahanWilayah = LahanWilayah::all();
        $saranaPrasarana = SaranaPrasarana::all();

        // dd(KategoriKemiskinan::all());



        return view('data-desa', [
            'byGender' => $pendudukByGender,
            'byPekerjaan' => $pendudukByPekerjaan,
            'byPendidikan' => $pendudukByPendidikan,
            'byKemiskinan' => $pendudukByKemiskinan,
            'byUsia' => $pendudukByUsia,
            'byStatusKawin' => $pendudukByStatusKawin,
            'jumlahKK' => $jumlahKK,
            'jumlahPenduduk' => $jumlahPenduduk,
            'lahanWilayah' => $lahanWilayah,
            'saranaPrasarana' => $saranaPrasarana,
        ]);
    }

    public function cekData(Request $request)
    {
        $nik = $request->input('nik');
        $dataPenduduk = null;
        if ($nik) {
            $dataPenduduk = DataPenduduk::with([
                'agama',
                'jenisBantuan',
                'kategoriKemiskinan',
                'pendidikan',
                'pekerjaan',
                'statusKawin',
                'statusKeluarga',
            ])->where('nik', $nik)->first();
            if (!$dataPenduduk) {
                return redirect()->route('cek-data')->with('error', 'Data dengan NIK ' . $nik . ' tidak ditemukan.');
            }

            return redirect()->route('cek-data')->with('success', [
                'no_kk' => $dataPenduduk->no_kk,
                'nik' => $dataPenduduk->nik,
                'nama_lengkap' => $dataPenduduk->nama_lengkap,
                'jenis_kelamin' => $dataPenduduk->jenis_kelamin,
                'tanggal_lahir' => $dataPenduduk->tanggal_lahir,
                'jenis_bantuan' => $dataPenduduk->jenisBantuan?->nama_bantuan ?? 'N/A',
                'penghasilan_bulanan' => $dataPenduduk->penghasilan_bulanan,
                'kategori_kemiskinan' => $dataPenduduk->kategoriKemiskinan?->nama_kategori ?? 'N/A',
            ]);
        }
        return view('cek-data');
    }

    public function pengaduanMasyarakat()
    {
        return view('pengaduan-masyarakat');
    }

    public function produkUmkm()
    {
        $data = UmkmDesa::with('kategoriUmkm')->get();
        return view('produk-umkm', compact('data'));
    }

    public function berita($slug)
    {
        $data = \App\Models\BeritaDesa::where('slug', $slug)->firstOrFail();
        $latest = \App\Models\BeritaDesa::latest()->take(5)->get();
        return view('publikasi.berita', compact('data', 'latest'));
    }
}