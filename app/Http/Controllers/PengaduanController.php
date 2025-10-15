<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\PengaduanStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengaduanMasyarakat;

class PengaduanController extends Controller
{
    //
    public function index()
    {
        return view('pengaduan.index');
    }

    public function bukti($code)
    {
        $pdf = Pdf::loadView('pengaduan.bukti', [
            'code' => $code,
            'link' => route('pengaduan-masyarakat.status', ['code' => $code]),
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
