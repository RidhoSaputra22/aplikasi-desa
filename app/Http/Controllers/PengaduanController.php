<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\PengaduanStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengaduanMasyarakat;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PengaduanController extends Controller
{
    //
    public function index()
    {
        return view('pengaduan.index');
    }

    public function bukti($code)
    {
        $link = route('pengaduan-masyarakat.status', ['code' => $code]);

        $qrcode = base64_encode(
            QrCode::format('png')
                ->size(200)
                ->errorCorrection('M')
                ->generate($link)
        );


        $pdf = Pdf::loadView('pengaduan.bukti', [
            'code' => $code,
            'link' => $link,
            'qrcode' => $qrcode,
            'jenisSurat' => 'Pengaduan Masyarakat',
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream("bukti-pengaduan-{$code}.pdf");
    }


    public function status($code)
    {

        $pengaduan = PengaduanMasyarakat::where('code', $code)->first();
        $status = PengaduanStatus::class;
        $jenisSurat = 'pengaduan-masyarakat';


        if (!$pengaduan) {
            abort(404);
        }

        return view('pengaduan.status', compact('pengaduan', 'status', 'jenisSurat'));
    }
}
