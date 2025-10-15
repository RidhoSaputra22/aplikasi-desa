<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bukti Pembuatan {{ $jenisSurat }} - {{ $code }}</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 40px;
        }

        * {
            /* outline: 1px solid red; */
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table {
            border-bottom: 3px solid #000;
        }

        .header-logo {
            width: 90px;
            height: auto;
        }

        .header-text {
            text-align: center;
            font-weight: bold;
            line-height: 1.3;
        }

        .header-text p {
            margin: 2px 0;
        }

        .header-address {
            text-align: center;
            font-size: 11pt;
            font-style: italic;
        }

        hr {
            border: 1px solid #000;
            /* margin-top: 5px; */
        }
    </style>
</head>

<body>
    {{-- Kop Surat --}}
    <header>
        <table class="header-table">
            <tr>
                <td style="width: 90px;">
                    <img src="{{ public_path('assets/logo.png') }}" class="header-logo">
                </td>
                <td>
                    <div class="header-text">
                        <p style="font-size: 16pt;">PEMERINTAH KABUPATEN BARRU</p>
                        <p style="font-size: 16pt;">KECAMATAN BARRU</p>
                        <p style="font-size: 16pt;">KELURAHAN TUWUNG</p>
                    </div>
                    <div class="header-address">
                        <p>Alamat: Tuwung, Kec. Barru, Kabupaten Barru, Sulawesi Selatan 90711</p>
                    </div>
                </td>
            </tr>
        </table>
        <hr>
    </header>

    {{-- Konten surat --}}
    <main>
        @yield('content')
    </main>
</body>

</html>
