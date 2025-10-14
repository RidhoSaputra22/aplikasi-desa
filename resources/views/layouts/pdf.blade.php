<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pembuatan {{ $jenisSurat }} - {{ $code }}</title>
    @vite('resources/css/pdf.css')

    <style>
        @page {
            size: A4 portrait;
            margin: 40px;
        }

        .page-break {
            page-break-before: always;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
        }



        .no-border {
            border: none !important;
        }
    </style>
</head>

{{-- Letterhead --}}

<body class="px-4 py-2 text-xs font-sans">
    <header name="letterhead">
        <div class="flex items-start justify-between  border-b-2 border-black pb-4 relative">
            <img src="{{ public_path('assets/logo.png') }}" alt="Logo" class="w-24 ">
            <div class="text-center w-full">
                <div class="text-3xl font-bold uppercase">
                    <h2 class="">Pemerintah Kabupaten Barru</h2>
                    <h2 class="">Kecamatan Barru</h2>
                    <h2 class="">Kelurahan Tuwung</h2>
                </div>
                <p class="text-sm mt-1">Alamat:Tuwung, Kec. Barru, Kabupaten Barru, Sulawesi Selatan 90711</p>
                {{-- <p class="text-xs">Telepon: 0822-5036-5529 | Email: info@siddiedu.com</p> --}}
            </div>
        </div>
        <hr class="border-black mb-4">

    </header>
    @yield('content')
</body>

</html>
