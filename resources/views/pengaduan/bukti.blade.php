@extends('layouts.pdf')

@section('content')
    <div style="text-align: center; margin-top: 3rem;">
        <p style="font-size: 1.5rem; font-weight: 600;">Bukti Pembuatan {{ $jenisSurat }}</p>
        <p style="font-size: 1.1rem;">
            Pindai QRCode atau klik tautan di bawah ini untuk melakukan pemantauan status surat
            keterangan yang telah dibuat sebelumnya. asd
        </p>

        <div style="margin: 1.5rem 0;">
            {{-- ✅ QR Code Image --}}
            <img src="data:image/png;base64,{{ $qrcode }}" alt="QR Code"
                style="width:150px; height:150px; margin-bottom: 10px;">
            <br>
            <a href="{{ $link }}" style="color: #0000ff; text-decoration: underline; font-size: 0.9rem;">
                {{ $link }}
            </a>
            <p style="font-size: 1.25rem; font-weight: 900; margin-top: 1rem;">{{ $code }}</p>
        </div>
    </div>
@endsection
