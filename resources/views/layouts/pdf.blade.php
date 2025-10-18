<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bukti Pembuatan {{ $jenisSurat ?? '' }} - {{ $code ?? '' }}</title>

    <style>
        * {
            /* outline: 1px solid red; */
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            margin: 20px 30px;
            /* line-height: 0.05; */
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        .header-table {
            border-bottom: 2px solid #000;
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
            font-size: 18pt;
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
                        <p>PEMERINTAH KABUPATEN BARRU</p>
                        <p>KECAMATAN BARRU</p>
                        <p>KELURAHAN TUWUNG</p>
                        <span class="header-address">Jl. Sultan Hasanuddin Nomor _ Tlp. (0427)21524 </span>

                    </div>
                </td>
            </tr>
        </table>
        <div style="height: 3px; background-color: #000; margin-top: 2px;">

        </div>
        {{-- <hr> --}}
    </header>

    {{-- Konten surat --}}
    <main>
        @yield('content')
    </main>
</body>

</html>
