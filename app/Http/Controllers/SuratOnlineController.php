<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
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
        $kepalaLurah = AparaturDesa::where('jabatan', 'Kepala Lurah')->first();

        $link = route('surat-online.lihat', ['jenis' => $jenis, 'code' => $code]);
        $qrcode = base64_encode(
            QrCode::format('png')
                ->size(200)
                ->errorCorrection('M')
                ->generate($link)
        );

        // Validate the certificate existence
        if (!$certificate) {
            abort(404);
        }

        switch ($jenis) {
            case CertificateType::KELAHIRAN->value:
                return Pdf::loadView('surat-online.jenis-surat.kelahiran', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case CertificateType::KEMATIAN->value:
                return Pdf::loadView('surat-online.jenis-surat.kematian', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case CertificateType::USAHA->value:
                return Pdf::loadView('surat-online.jenis-surat.usaha', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case CertificateType::DOMISILI->value:
                return Pdf::loadView('surat-online.jenis-surat.domisili', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case CertificateType::PENGHASILAN_ORANG_TUA->value:
                return Pdf::loadView('surat-online.jenis-surat.penghasilan-ortu', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 945.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case CertificateType::TIDAK_MAMPU->value:
                return Pdf::loadView('surat-online.jenis-surat.tidak-mampu', [
                    'code' => $code,
                    'certificate' => $certificate,
                    'qrcode' => $qrcode,
                    'jenisSurat' => $jenisSurat,
                    'kepalaLurah' => $kepalaLurah,
                ])->setPaper(array(0, 0, 609.4488, 945.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            case 'bantuan':
                return Pdf::loadView('surat-online.jenis-surat.bantuan', [
                    'code' => $code,
                ])->setPaper(array(0, 0, 609.4488, 935.433), 'portrait')->stream("bukti-pembuatan-surat-{$jenis}-{$code}.pdf");

            default:
                // no specific view, continue to generic view below
                break;
        }
    }

    public function suratBantuan($nik)
    {

        $dataPenduduk = DataPenduduk::where('nik', $nik)->first();

        if ($dataPenduduk === null) {
            abort(404);
        }

        $now = now()->format('Y-m-d_H-i-s');
        $kepalaLurah = AparaturDesa::where('jabatan', 'Kepala Lurah')->first();

        $link = route('surat-online.surat-bantuan', $nik);
        $qrcode = base64_encode(
            QrCode::format('png')
                ->size(200)
                ->errorCorrection('M')
                ->generate($link)
        );


        return Pdf::loadView('surat-online.jenis-surat.terima-bantuan', [
            'dataPenduduk' => $dataPenduduk,
            'qrcode' => $qrcode,
            'kepalaLurah' => $kepalaLurah,
            'jenisSurat' => 'SURAT KETERANGAN PENERIMAAN BANTUAN',
        ])->setPaper(array(0, 0, 609.4488, 945.433), 'portrait')->stream("surat-bantuan-{$now}.pdf");
    }
}
