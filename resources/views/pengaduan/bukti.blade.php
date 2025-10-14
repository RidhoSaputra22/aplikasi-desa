@extends('layouts.pdf')

@section('content')
    <div class="text-center my-12 space-y-2">
        <p class="text-2xl font-semibold">Bukti Pembuatan Pengaduan</p>
        <p class="text-xl font-normal">Pindai QRCode atau klik tautan di bawah ini untuk melakukan pemantauan status
            pengaduan yang telah dibuat sebelumnya</p>

        <div class="flex flex-col justify-center items-center-safe my-6 space-y-2">
            <div id="qrcode"></div>
            <a class="text-[#0000ff] underline text-sm" href="{{ $link }}">{{ $link }}</a>
            <p class="text-xl font-black">{{ $code }}</p>
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
