<?php

use App\Models\ProfilDesa;
use App\Models\AparaturDesa;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SuratOnlineController;
use App\Livewire\Guest\Publikasi\Pencarian;

Route::get('/', [GuestController::class, 'welcome'])->name('home');

// Main navigation routes
Route::get('/profil-desa', [GuestController::class, 'profilDesa'])->name('profil-desa');

Route::get('/data-desa', [GuestController::class, 'dataDesa'])->name('data-desa');

Route::get('/cek-data', [GuestController::class, 'cekData'])->name('cek-data');


Route::group(['prefix' => 'surat-online'], function () {
    Route::get('/', [SuratOnlineController::class, 'index'])->name('surat-online');
    Route::get('bukti-pembuatan-surat/{jenis}/{code}', [SuratOnlineController::class, 'buktiPembuatanSurat'])->name('surat-online.bukti-pembuatan-surat');
    Route::get('status/{jenis}/{code}', [SuratOnlineController::class, 'status'])->name('surat-online.status');
    Route::get('lihat/{jenis}/{code}', [SuratOnlineController::class, 'lihat'])->name('surat-online.lihat');
});

Route::get('/publikasi', [GuestController::class, 'publikasi'])->name('publikasi');
Route::get('/publikasi/berita', Pencarian::class)->name('publikasi.cari');
Route::get('/publikasi/berita/{slug}', [GuestController::class, 'berita'])->name('publikasi.berita');


Route::get('/parawisata', [GuestController::class, 'parawisata'])->name('parawisata');
Route::get('/parawisata/{slug}', [GuestController::class, 'parawisataDetail'])->name('parawisata.detail');

Route::get('/produk-umkm', [GuestController::class, 'produkUmkm'])->name('produk-umkm');

Route::group(['prefix' => 'pengaduan-masyarakat'], function () {
    Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan-masyarakat');
    Route::get('bukti/{code}', [PengaduanController::class, 'bukti'])->name('pengaduan-masyarakat.bukti');
    Route::get('status/{code}', [PengaduanController::class, 'status'])->name('pengaduan-masyarakat.status');
});


Route::get('/kontak', [GuestController::class, 'kontak'])->name('kontak');
