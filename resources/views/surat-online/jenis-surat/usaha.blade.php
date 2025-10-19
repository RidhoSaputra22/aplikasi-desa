@extends('layouts.pdf')


@section('content')
    <!-- Judul Surat -->
    <div style="text-align: center; ">
        <h2
            style="font-size: 1.125rem; font-weight: bold; text-decoration: underline; margin-bottom: 0.25rem; text-transform: uppercase;">
            {{ $jenisSurat }}
        </h2>
        <p style="font-size: 0.875rem; margin-top: 0.25rem;">
            Nomor: {{ $certificate->code ?? '500/KESRA/KM/2022/01' }}
        </p>
    </div>

    <!-- Pembuka -->
    <div style="">
        <p style="">
            Yang bertanda tangan dibawah ini:
        </p>

        <table style="margin-left: 2.5rem; line-height: 1.75;">
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Nama</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->village_head_name ?? 'Arjunalis' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Jabatan</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->village_head_position ?? 'Kepala Desa' }}</td>
            </tr>
        </table>
    </div>

    <!-- Isi Surat -->
    <div style="">
        <p style="">
            Dengan ini menerangkan bahwa:
        </p>

        <table style="margin-left: 2.5rem; line-height: 1.75;">
            <tr>
                <td style="width: 11rem; vertical-align: top;">Nama</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->name ?? 'Isly Suganda' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">NIK</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->id_card_number ?? '1408012211950001' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Tempat, Tanggal Lahir</td>
                <td style="text-align: center;">:</td>
                <td>
                    {{ $certificate->place_of_birth ?? 'Pekanbaru' }},
                    @if (isset($certificate->day_of_birth) && isset($certificate->month_of_birth) && isset($certificate->year_of_birth))
                        {{ $certificate->day_of_birth }}
                        @php
                            $months = [
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            ];
                        @endphp
                        {{ $months[$certificate->month_of_birth] ?? '' }} {{ $certificate->year_of_birth }}
                    @else
                        20 November 1980
                    @endif
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Agama</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->religion ?? 'Islam' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Jenis kelamin</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->gender ?? 'Laki-laki' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Pekerjaan</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->profession ?? 'Pedagang Buah' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Alamat Sekarang</td>
                <td style="text-align: center;">:</td>
                <td>{{ $certificate->address ?? 'Jl. Lorem Ipsum Dolor Sit Amet' }}</td>
            </tr>
        </table>
    </div>

    <!-- Keterangan Usaha -->
    <div style="margin-top: 0.5rem;  line-height: 1.625;">
        <p style="text-align: justify;">
            Bahwa tersebut namanya di atas adalah benar memiliki Usaha {{ $certificate->business_name ?? 'Usaha Buah' }},
            yang terletak di
            {{ $certificate->address ?? 'RW 01, Kelurahan Tuwung, Kecamatan Barru, Kabupaten Barru' }}.
            Demikian Surat Keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk
            di pergunakan sebagaimana mestinya.
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
                        {{ $certificate->village_head_name ?? 'Arjunalis' }}
                    </p>
                    <p style="margin-top: 0.125rem;">
                        NIP: {{ $certificate->village_head_nip ?? '-' }}
                    </p>
                </td>
            </tr>
        </table>
    </div>
@endsection
