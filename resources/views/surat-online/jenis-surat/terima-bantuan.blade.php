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
                <td style="width: 10.5rem; vertical-align: top;">Nama</td>
                <td style="width: 4.25rem; text-align: center;">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">NIP</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Jabatan</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td></td>
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
                <td>{{ $dataPenduduk->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">NIK</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $dataPenduduk->nik }}</td>
            </tr>
            <tr>
                <td style="width: 10.5rem; vertical-align: top;">Tanggal Lahir</td>
                <td style="width: 4.25rem; text-align: center;">:</td>
                <td>{{ \Carbon\Carbon::parse($dataPenduduk->tanggal_lahir)->locale() }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Alamat</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $dataPenduduk->alamat }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Jenis Kelamin</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $dataPenduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td style="width: 7.5rem; vertical-align: top;">Pekerjaan</td>
                <td style="width: 1.25rem; text-align: center;">:</td>
                <td>{{ $dataPenduduk->pekerjaan->nama_pekerjaan }}</td>
            </tr>

        </table>
    </div>

    <!-- Keterangan Usaha -->
    <div style="margin-top: 0.5rem;  line-height: 1.625;">
        <p style="text-align: justify;">
            Bahwa yang tersebut namanya diatas benar warga Kelurahan Tuwung, Kecamatan
            Barru, Kabupaten Barru, benar telah menerima bantuan (JENIS BANTUAN YANG TELAH
            DITERIMA) sesuai dengan ketentuan yang berlaku.
        </p>

        <p style="text-align: justify;">
            Demikian surat keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk
            dipergunakan sebagaimana mestinya.
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
