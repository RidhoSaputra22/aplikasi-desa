<?php

namespace App\Http\Controllers;

use App\Enums\CertificateStatus;
use Illuminate\Http\Request;
use App\Enums\CertificateType;
use Spatie\LaravelPdf\Facades\Pdf;

class SuratOnlineController extends Controller
{
    //

    public function index()
    {
        return view('surat-online.index');
    }

    public function buktiPembuatanSurat($jenis, $code)
    {
        // Validate the certificate type
        if (!in_array($jenis, CertificateType::route())) {
            abort(404);
        }

        $certificate = CertificateType::from($jenis)->modelClass()->where('code', $code)->first();
        $jenisSurat = CertificateType::from($jenis)->label();

        // Validate the certificate existence
        if (!$certificate) {
            abort(404);
        }

        return Pdf::view('surat-online.bukti', [
            'code' => $code,
            'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
            'jenisSurat' => $jenisSurat,
        ])
            ->name("bukti-pembuatan-surat-{$jenis}-{$code}.pdf")
            ->format('A4');
    }

    public function status($jenis, $code)
    {
        // Validate the certificate type
        if (!in_array($jenis, CertificateType::route())) {
            abort(404);
        }

        $certificate = CertificateType::from($jenis)->modelClass()->where('code', $code)->first();
        $jenisSurat = CertificateType::from($jenis)->label();
        $status = CertificateStatus::class;

        // Validate the certificate existence
        if (!$certificate) {
            abort(404);
        }

        return view('surat-online.status', compact('certificate', 'jenisSurat', 'status', 'jenis'));
    }

    public function lihat($jenis, $code)
    {
        // Validate the certificate type
        if (!in_array($jenis, CertificateType::route())) {
            abort(404);
        }

        $certificate = CertificateType::from($jenis)->modelClass()->where('code', $code)->first();
        $jenisSurat = CertificateType::from($jenis)->label();
        $status = CertificateStatus::class;

        // Validate the certificate existence
        if (!$certificate) {
            abort(404);
        }

        return Pdf::view('surat-online.lihat', [
            'code' => $code,
            'certificate' => $certificate,
            'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
            'jenisSurat' => $jenisSurat,
        ])
            ->name("bukti-pembuatan-surat-{$jenis}-{$code}.pdf")
            ->format('A4');
    }
}
