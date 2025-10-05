@extends('layouts.pdf')

@section('content')
    <!-- Judul Surat -->
    <div class="text-center my-5    ">
        <h2 class="text-lg font-bold underline mb-1">
            SURAT KETERANGAN USAHA
        </h2>
        <p class="text-sm mt-1">
            Nomor: {{ $certificate->code ?? '500/KESRA/KM/2022/01' }}
        </p>
    </div>

    <!-- Pembuka -->
    <div class="my-5     leading-relaxed">
        <p class=" text-justify mb-5">
            Yang bertanda tangan dibawah ini:
        </p>

        <table class="ml-10 leading-loose">
            <tr>
                <td class="w-30 align-top">Nama</td>
                <td class="w-5 text-center">:</td>
                <td>{{ $certificate->village_head_name ?? 'Arjunalis' }}</td>
            </tr>
            <tr>
                <td class="align-top">Jabatan</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->village_head_position ?? 'Kepala Desa' }}</td>
            </tr>
        </table>
    </div>

    <!-- Isi Surat -->
    <div class="my-5     leading-relaxed">
        <p class="text-justify mb-5">
            Dengan ini menerangkan bahwa:
        </p>

        <table class="ml-10 leading-loose">
            <tr>
                <td class="w-44 align-top">Nama</td>
                <td class="w-5 text-center">:</td>
                <td>{{ $certificate->name ?? 'Isly Suganda' }}</td>
            </tr>
            <tr>
                <td class="align-top">NIK</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->id_card_number ?? '1408012211950001' }}</td>
            </tr>
            <tr>
                <td class="align-top">Tempat, Tanggal Lahir</td>
                <td class="text-center">:</td>
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
                <td class="align-top">Agama</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->religion ?? 'Islam' }}</td>
            </tr>
            <tr>
                <td class="align-top">Jenis kelamin</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->gender ?? 'Laki-laki' }}</td>
            </tr>
            <tr>
                <td class="align-top">Pekerjaan</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->profession ?? 'Pedagang Buah' }}</td>
            </tr>
            <tr>
                <td class="align-top">Alamat Sekarang</td>
                <td class="text-center">:</td>
                <td>{{ $certificate->address ?? 'Jl. Lorem Ipsum Dolor Sit Amet' }}</td>
            </tr>
        </table>
    </div>

    <!-- Keterangan Usaha -->
    <div class="my-2 leading-relaxed">
        <p class="text-justify mb-4">
            Adalah benar Penduduk Desa Kelurahan Tuwung Kecamatan XIII Koto Kampar Kabupaten
            Kampar, menurut sepengetahuan kami benar mempunyai/memiliki usaha uang bergerak
            dibidang:
        </p>

        <div class="text-center my-5">
            <h3 class="text-base font-bold underline">
                {{ $certificate->business_type ?? 'Usaha Buah' }}
            </h3>
        </div>

        <p class="text-justify mt-4">
            Usaha uang dimiliki oleh yang bersangkutan benar berada di wilayah Desa Kelurahan Tuwung
            {{ $certificate->business_description ?? 'dengan alamat usaha di Jl. Poros Desa Kelurahan Tuwung.' }}
        </p>
    </div>

    <!-- Penutup -->
    <div class="my-2 leading-relaxed">
        <p class="text-justify">
            Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan
            sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanggal dan Tanda Tangan -->
    <div class="mt-10">
        <div class="flex">
            <div class="w-1/2"></div>
            <div class="w-1/2 text-center">
                <p>
                    Kelurahan Tuwung,
                    {{ $certificate->created_at ? $certificate->created_at->format('d F Y') : date('d F Y') }}
                </p>
                <p class="mt-1 font-bold">
                    Kepala Desa Kelurahan Tuwung
                </p>

                <!-- Space untuk tanda tangan -->
                <div class="h-20"></div>

                <p class="font-bold underline">
                    {{ $certificate->village_head_name ?? 'Arjunalis' }}
                </p>
                <p class="mt-0.5">
                    NIP: {{ $certificate->village_head_nip ?? '-' }}
                </p>
            </div>
        </div>
    </div>
@endsection
