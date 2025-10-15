@extends('layouts.pdf')

@section('content')
    <div
        style="text-align: center; margin-top: 3rem; margin-bottom: 3rem; display: flex; flex-direction: column; gap: 0.5rem;">
        <p style="font-size: 1.5rem; font-weight: 600;">Bukti Pembuatan {{ $jenisSurat }}</p>
        <p style="font-size: 1.25rem; font-weight: 400;">Pindai QRCode atau klik tautan di bawah ini untuk melakukan
            pemantauan status
            surat
            keterangan yang telah dibuat sebelumnya</p>

        <div
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 1.5rem; margin-bottom: 1.5rem; gap: 0.5rem;">
            <div id="qrcode"></div>
            <a style="color: #0000ff; text-decoration: underline; font-size: 0.875rem;"
                href="{{ $link }}">{{ $link }}</a>
            <p style="font-size: 1.25rem; font-weight: 900;">{{ $code }}</p>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
    <script>
        window.onload = function() {
            generateQRCode();
        };

        function generateQRCode() {
            var qr = qrcode(0, 'M');
            qr.addData("{{ $link }}");
            qr.make();
            document.getElementById('qrcode').innerHTML = qr.createImgTag(4);
        }
    </script>
@endsection
