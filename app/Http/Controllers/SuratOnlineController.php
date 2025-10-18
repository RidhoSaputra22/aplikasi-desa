<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use App\Enums\CertificateType;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Enums\CertificateStatus;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        $link = route('surat-online.status', ['jenis' => $jenis, 'code' => $code]);

        $qrcode = base64_encode(
            QrCode::format('png')
                ->size(200)
                ->errorCorrection('M')
                ->generate($link)
        );

        // dd($qrcode);

        $certificate = CertificateType::from($jenis)->modelClass()->where('code', $code)->first();
        $jenisSurat = CertificateType::from($jenis)->label();

        // Validate the certificate existence
        if (!$certificate) {
            abort(404);
        }

        $pdf = Pdf::loadView('surat-online.bukti', [
            'code' => $code,
            'link' => $link,
            'jenisSurat' => $jenisSurat,
            'qrcode' => $qrcode,
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
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

        if ($jenis == CertificateType::KEMATIAN->value) {
            return Pdf::loadView('surat-online.jenis-surat.kematian', [
                'code' => $code,
                'certificate' => $certificate,
                'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
                'jenisSurat' => $jenisSurat,
            ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
        }

        if ($jenis == CertificateType::USAHA->value) {
            return Pdf::loadView('surat-online.jenis-surat.usaha', [
                'code' => $code,
                'certificate' => $certificate,
                'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
                'jenisSurat' => $jenisSurat,
            ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
        }

        if ($jenis == CertificateType::PENGHASILAN_ORANG_TUA->value) {
            return Pdf::loadView('surat-online.jenis-surat.penghasilan-ortu', [
                'code' => $code,
                'certificate' => $certificate,
                'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
                'jenisSurat' => $jenisSurat,
            ])->setPaper(array(0, 0, 609.4488, 945.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
        }

        if ($jenis == 'bantuan') {
            return Pdf::loadView('surat-online.jenis-surat.bantuan', [
                'code' => $code,
            ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
        }

        $pdf = Pdf::loadView('surat-online.lihat', [
            'code' => $code,
            'certificate' => $certificate,
            'link' => route('surat-online.status', ['jenis' => $jenis, 'code' => $code]),
            'jenisSurat' => $jenisSurat,
        ]);

        $pdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');

        return $pdf->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");
    }

    public function suratBantuan($nik)
    {

        $dataPenduduk = DataPenduduk::where('nik', $nik)->first();
        $now = now()->format('Y-m-d_H-i-s');

        return Pdf::loadView('surat-online.jenis-surat.terima-bantuan', [
            'dataPenduduk' => $dataPenduduk,
            'jenisSurat' => 'SURAT KETERANGAN PENERIMAAN BANTUAN',
        ])->setPaper(array(0, 0, 609.4488, 945.433), 'portrait')->stream("surat-bantuan-{$now}.pdf");
    }
}
