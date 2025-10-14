<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\PengaduanStatus;
use Spatie\LaravelPdf\Facades\Pdf;
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
        // return view('pengaduan.bukti', compact('code'));
        return Pdf::view('pengaduan.bukti', [
            'code' => $code,
            'link' => route('pengaduan-masyarakat.status', ['code' => $code]),
            'jenisSurat' => 'Pengaduan Masyarakat',
        ])
            ->name("bukti-pengaduan-{$code}.pdf")
            ->format('A4');
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
