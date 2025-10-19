@extends('layouts.pdf')


@section('content')
    <!-- Judul Surat -->
    <div style="text-align: center; ">
        <h2
            style="font-size: 1.125rem; font-weight: bold; text-decoration: underline; margin-bottom: 0.25rem; text-transform: uppercase;">
            {{ $jenisSurat }}
        </h2>
        <p style="font-size: 0.875rem; margin-top: 0.25rem;">
            Nomor: {{ $certificate->no_surat ?? '-' }}
        </p>
    </div>

    <!-- Pembuka -->
    <div style="">
        <p style="line-height: 1.625;">
            Yang bertanda tangan di bawah ini Kepala Lurah Tuwung Kecamatan Barru Kabupaten
            Barru menerangkan bahwa:
        </p>

        <table style="margin-left: 2.5rem; line-height: 1.75;">
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Pada Hari</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ \Carbon\Carbon::createFromDate(null, $certificate->month_of_death, $certificate->day_of_death)->translatedFormat('l') ?? '' }}
                </td>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Tanggal</td>
                <td style="text-align: center;">:</td>
                <td>{{ \Carbon\Carbon::createFromDate(null, $certificate->month_of_death, $certificate->day_of_death)->translatedFormat('d F Y') ?? '' }}
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">DI</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->place_of_death ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- Keterangan Usaha -->
    <div style="margin-top: 0.5rem;  line-height: 1.625;">
        <p style="text-align: justify;">
            Telah meninggal dunia seorang {{ $certificate->gender == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }} Bernama
            {{ $certificate->name ?? '' }} di
            sebabkan karena {{ $certificate->cause_of_death ?? '' }}.
            Demikian surat keterangan ini diberikan kepadanya untuk dipergunakan seperlunya.
        </p>
    </div>



    <!-- Tanggal dan Tanda Tangan -->
    <div style="margin-top: 2.5rem;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;"></td> <!-- Kosong di sisi kiri -->
                <td style="width: 50%; text-align: center;">
                    <p>
                        Kelurahan Tuwung,
                        {{ $certificate->created_at ? $certificate->created_at->format('d F Y') : date('d F Y') }}
                    </p>
                    <p style="margin-top: 0.25rem; font-weight: bold;">
                        Kepala Desa Kelurahan Tuwung
                    </p>

                    <div style="margin: 1.5rem 0;">
                        <img src="data:image/png;base64,{{ $qrcode }}" alt="QR Code"
                            style="width:100px; height:100px; margin-bottom: 10px;">
                    </div>

                    <p style="font-weight: bold; text-decoration: underline;">
                        {{ $kepalaLurah->nama }}
                    </p>
                    <p style="margin-top: 0.125rem;">
                        NIP: {{ $kepalaLurah->nip ?? '-' }}
                    </p>
                </td>
            </tr>
        </table>
    </div>
@endsection
