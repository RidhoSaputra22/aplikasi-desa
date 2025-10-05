<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratOnlineController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Main navigation routes
Route::get('/profil-desa', function () {
    return view('profil-desa');
})->name('profil-desa');

Route::get('/data-desa', function () {
    return view('data-desa');
})->name('data-desa');

Route::group(['prefix' => 'surat-online'], function () {
    Route::get('/', [SuratOnlineController::class, 'index'])->name('surat-online');

    Route::get('bukti-pembuatan-surat/{jenis}/{code}', [SuratOnlineController::class, 'buktiPembuatanSurat'])->name('surat-online.bukti-pembuatan-surat');

    Route::get('status/{jenis}/{code}', [SuratOnlineController::class, 'status'])->name('surat-online.status');
    Route::get('lihat/{jenis}/{code}', [SuratOnlineController::class, 'lihat'])->name('surat-online.lihat');
});

Route::get('/publikasi', function () {
    return view('publikasi');
})->name('publikasi');

Route::get('/parawisata', function () {
    return view('parawisata');
})->name('parawisata');

Route::get('/produk-umkm', function () {
    return view('produk-umkm');
})->name('produk-umkm');

Route::get('/pengaduan-masyarakat', function () {
    return view('pengaduan-masyarakat');
})->name('pengaduan-masyarakat');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Tourist attraction detail routes
Route::get('/parawisata/puncak-kobe', function () {
    return view('parawisata.puncak-kobe');
})->name('parawisata.puncak-kobe');

Route::get('/parawisata/sungai-gagak', function () {
    return view('parawisata.sungai-gagak');
})->name('parawisata.sungai-gagak');

Route::get('/parawisata/talau-pusako', function () {
    return view('parawisata.talau-pusako');
})->name('parawisata.talau-pusako');

// Publication routes
Route::get('/publikasi/berita/{slug}', function ($slug) {
    return view('publikasi.berita.detail', compact('slug'));
})->name('publikasi.berita.detail');
