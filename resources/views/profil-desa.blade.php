@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        <div class="flex-1 ">
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20">
                    </div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20">
                    </div>
                </div>
                <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                    <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                        profil desa
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        Informasi mengenai sejarah, visi, misi desa beserta lebih mengenal aparatur-aparatur
                        desa kelurahan tuwung
                    </p>
                </div>
            </section>
            <section class="relative content">
                <div class="grid max-w-6xl grid-cols-1 gap-10 py-20 pt-0 mx-auto lg:gap-20 lg:pt-20 lg:grid-cols-5">
                    <div class="col-span-1 lg:col-span-2">
                        <img src="https://kotomesjid.com/storage/image/hero/desa-koto-mesjid.jpg" alt="desa-koto-mesjid"
                            class="object-cover w-full h-96 lg:h-[600px] rounded-xl">
                    </div>
                    <div class="col-span-1 space-y-10 lg:col-span-3">
                        <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                            sejarah desa
                        </h6>
                        <div class="font-light leading-relaxed prose-xl ck-content ck-custom">
                            <p>Desa Kelurahan Tuwung merupakan desa relokasi / pemindahan / transmigrasi lokal dari
                                proyek PLTA Koto Panjang, tepatnya pada tahun 1992. Desa Kelurahan Tuwung merupakan
                                salah satu desa dari 8 (delapan) desa yang termasuk ke dalam daerah genangan
                                Waduk PLTA Koto Panjang. Pada awalnya desa Kelurahan Tuwung masih bergabung dengan
                                desa induk yaitu Desa Pulau Gadang. Pada tahun 1999 terjadi pemekaran dari Desa
                                Pulau Gadang pada tahun berdasarkan surat Keputusan Gubernur Riau Nomor: 247
                                Tahun 1999, yang dipimpin oleh Pjs. Bapak Bakaruddin. Secara adminitrastif, Desa
                                Kelurahan Tuwung masuk kedalam wilayah Kecamatan XIII Koto Kampar Kabupaten Kampar,
                                sedangkan secara Adat wilayah Desa Kelurahan Tuwung merupakan salah satu desa dalam
                                wilayah adat Andiko 44, dengan batas-batas wilayah sebagai berikut:</p>
                            <ul>
                                <li>Sebelah Utara berbatas dengan Desa Silam Kecamatan Kuok</li>
                                <li>Sebelah Selatan berbatas dengan Ulayat Kenegarian Pulau Gadang</li>
                                <li>Sebelah Barat Berbatas dengan Desa Pulau Gadang Kecamatan XIII Koto Kampar
                                </li>
                                <li>elah Timur Berbatas dengan Desa Merangin Kecamatan Kuok</li>
                            </ul>
                            <p>Jarak Desa Kelurahan Tuwung dengan Ibu Kota Kecamatan, Kabupaten dan Propinsi antara
                                lain:</p>
                            <ul>
                                <li>Jarak dengan Ibukota Kecamatan 15 km, waktu tempuh + 25 menit</li>
                                <li>Jarak dengan Ibukota Kabupaten 21 km, waktu tempuh + 45 menit</li>
                                <li>Jarak dengan Ibukota Propinsi 99 km, waktu tempuh + 90 menit</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="relative content">
                <div class="grid max-w-6xl grid-cols-1 gap-10 py-20 pt-0 mx-auto lg:gap-20 lg:pt-20 lg:grid-cols-5">
                    <div class="col-span-1 space-y-20 lg:col-span-3">
                        <div class="space-y-10">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                                visi
                            </h6>
                            <div class="font-light leading-relaxed prose-xl ck-content ck-custom">
                                <p>Menuju Desa Berbasis Digital, Inovatif dalam Mengelola Potensi Desa dengan
                                    Produk Unggulan di Sektor Perikanan dan Pariwisata Agar Terwujudnya
                                    Masyarakat yang Religius, Beradat, Mandiri dan Sejahtera</p>
                            </div>
                        </div>
                        <div class="space-y-10">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                                misi
                            </h6>
                            <div class="font-light leading-relaxed prose-xl ck-content ck-custom">
                                <ol>
                                    <li>Optimalisasi Peran Pemerintah Desa dalam Pelayanan kepada Masyarakat
                                        Berbasis Digital</li>
                                    <li>Berperan Aktif dan Menjalin Komunikasi dengan Kepemudaan, Mahasiswa dan
                                        Perguruan Tinggi dalam Berinovasi untuk Menopang Pengembangan Potensi
                                        Desa</li>
                                    <li>Menjaga, Memelihara, Melestarikan serta Mengembangkan Nilai-Nilai
                                        Warisan Budaya Lokal yang Berkualitas dan Berkelanjutan</li>
                                    <li>Meningkatkan Sumber Daya Manusia (SDM) melalui Percepatan Pembangunan
                                        dan Pengembangan di Sektor Perikanan dan Pariwisata</li>
                                    <li>Memperkuat Fungsi Lembaga yang Ada di Desa</li>
                                    <li>Pelaksanaan Pembangunan yang Berkesinambungan dan Mengedepankan
                                        Partisipasi Gotong Royong Masyarakat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2">
                        <img src="https://kotomesjid.com/storage/image/hero/desa-wisata-kampung-patin.jpg"
                            alt="desa-koto-mesjid" class="object-cover w-full h-96 lg:h-[600px] rounded-xl">
                    </div>
                </div>
            </section>
            <section class="relative content">
                <div class="max-w-6xl py-20 pt-0 mx-auto space-y-10">
                    <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                        aparatur desa
                    </h6>
                    <div class="grid grid-cols-2 gap-5 gap-y-8 md:grid-cols-3 lg:grid-cols-4 md:gap-10">
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/arjunalis.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl" alt="Arjunalis">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Arjunalis
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Desa Kelurahan Tuwung
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/geneper-siddik-s-pi.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Geneper Siddik, S. Pi">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Geneper Siddik, S. Pi
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Sekretaris Desa
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/agussalim-j.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Agussalim. J">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Agussalim. J
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Seksi Kesejahteraan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/ria-mariana-s-pd.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Ria Mariana, S. Pd">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Ria Mariana, S. Pd
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Urusan Keuangan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/ali-akbar.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl" alt="Ali Akbar">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Ali Akbar
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Urusan Perencanaan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/doni-maryandi-s-pt.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Doni Maryandi, S. Pt">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Doni Maryandi, S. Pt
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Seksi Pemerintahan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/vella-yulita.jpg"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Vella Yulita">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Vella Yulita
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Seksi Pelayanan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/asril-leo.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl" alt="Asril Leo">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Asril Leo
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Staf Kesejahteraan dan Pelayanan
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/nuari-afrinaldi-s-pd.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Nuari Afrinaldi, S. Pd">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Nuari Afrinaldi, S. Pd
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Urusan Tata Usaha dan Umum
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/ali-yasri.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl" alt="Ali Yasri">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Ali Yasri
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Dusun I Pincuran Bilah
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/benny-pranata.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Benny Pranata">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Benny Pranata
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Dusun II Pincuran Gading
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/idel-primana.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Idel Primana">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Idel Primana
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Dusun III Kampung Baru
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3 sequenced">
                            <img src="https://kotomesjid.com/storage/image/profile/human-resource/heri-caldra.png"
                                class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                alt="Heri Caldra">
                            <div class="space-y-1 text-center md:space-y-2">
                                <h6 class="text-base font-semibold md:text-xl">
                                    Heri Caldra
                                </h6>
                                <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                    Kepala Dusun IV Kampung Baru
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
