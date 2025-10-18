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
            Saya Yang bertanda tangan dibawah ini:
        </p>

        <table style="margin-left: 2.5rem; line-height: 1.75;">
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Nama</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->parent_name ?? 'Arjunalis' }}</td>
            </tr>
            <tr>
                <td style="width: 10.5rem; vertical-align: top;">Tempat / Tanggal Lahir</td>
                <td style="width: 4.25rem; text-align: center;">:</td>
                <td>{{ $certificate->parent_place_of_birth ?? 'Pekanbaru' }},
                    @if (isset($certificate->parent_day_of_birth) &&
                            isset($certificate->parent_month_of_birth) &&
                            isset($certificate->parent_year_of_birth))
                        {{ $certificate->parent_day_of_birth }}
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
                        {{ $months[$certificate->parent_month_of_birth] ?? '' }} {{ $certificate->parent_year_of_birth }}
                    @else
                        20 November 1980
                    @endif
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Alamat</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->address ?? 'Jl. Raya No. 1' }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Pekerjaan</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->profession ?? 'Arjunalis' }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Jumlah Tanggungan</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->number_depandent ?? '0' }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Penghasilan</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>Rp. {{ number_format($certificate->nominal_income) ?? '0   ' }}</td>
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
                <td style="width: 7.5rem; vertical-align: top;">Nama</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $certificate->name ?? 'Isly Suganda' }}</td>
            </tr>
            <tr>
                <td style="width: 10.5rem; vertical-align: top;">Tempat, Tanggal Lahir</td>
                <td style="width: 4.25rem; text-align: center;">:</td>
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
            Bahwa tersebut namanya di atas adalah benar saat ini berdomisili di
            {{ $certificate->address ?? 'Jl. Lorem Ipsum Dolor Sit Amet' }}, Kelurahan Tuwung, Kecamatan Barru, Kabupaten
            Barru dan berlaku Sejak dikeluarkannya pada
            {{ $certificate->created_at ? $certificate->created_at->format('d F Y') : date('d F Y') }} sampai dengan
            {{ \Carbon\Carbon::parse($certificate->created_at)->addYear()->format('d F Y') }}.
        </p>

        <p style="text-align: justify;">
            Demikian Surat Keterangan Domisili ini dibuat dan diberikan kepada yang
            bersangkutan untuk dipergunakan sebagaimana mestinya.
        </p>


    </div>

    <!-- Tanggal dan Tanda Tangan -->
    <div style="">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;">
                    <p style="margin: 0;">
                        Mengetahui,
                    </p>
                    <p style="margin: 0 0 0 10px; font-weight: bold;">An. LURAH TUWUNG</p>


                    <!-- Space untuk tanda tangan -->
                    <div style="height: 3rem;"></div>

                    <p style="font-weight: bold; text-decoration: underline;">
                        {{ $certificate->village_head_name ?? 'Arjunalis' }}
                    </p>
                    <p style="margin-top: 0.125rem;">
                        NIP: {{ $certificate->village_head_nip ?? '-' }}
                    </p>
                </td> <!-- Kosong di sisi kiri -->
                <td style="width: 50%; text-align: start;">
                    <p style="margin: 0;">
                        Tuwung,
                    </p>
                    <p style="margin: 0; font-weight: bold;">
                        Yang Membuat Pernyataan,
                    </p>

                    <!-- Space untuk tanda tangan -->
                    <div style="height: 3rem;"></div>

                    <p style="font-weight: bold; text-decoration: underline;">
                        {{ $certificate->name ?? 'Arjunalis' }}
                    </p>
                    <p style="margin-top: 0.125rem;">
                        {{-- NIP: {{ $certificate->village_head_nip ?? '-' }} --}}
                    </p>
                </td>
            </tr>
        </table>

    </div>
@endsection
