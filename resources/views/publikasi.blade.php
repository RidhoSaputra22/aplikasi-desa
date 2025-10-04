@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        {{-- Main Content --}}
        <div class="flex-1 px-6 md:px-10 lg:px-20">
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20">
                    </div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20">
                    </div>
                </div>
                <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                    <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                        publikasi
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        Temukan berbagai informasi publikasi mengenai kelurahan tuwung berupa berita, galeri
                        gambar, galeri vidio maunpun pengumuman dihalaman ini
                    </p>
                </div>
            </section>
            <section id="content" class="relative">
                <div class="max-w-6xl py-20 pt-0 mx-auto space-y-32 lg:pt-20">
                    <div class="space-y-10">
                        <div id="sub-title" class="flex items-center justify-between">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                berita
                            </h6>
                            <a href="https://kotomesjid.com/publikasi/berita"
                                class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                Lihat semua
                            </a>
                        </div>
                        <div class="grid grid-cols-1 gap-8 md:gap-10 lg:grid-cols-2">
                            <div class="row-span-1 lg:row-span-3">
                                <div class="hidden lg:block">
                                    <a href="https://kotomesjid.com/publikasi/berita/tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual"
                                        class="sequenced">
                                        <div class="relative w-full overflow-hidden rounded-xl h-96">
                                            <img src="https://kotomesjid.com/storage/image/publication/news/tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual.jpg"
                                                class="object-cover w-full h-full"
                                                alt="tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual">
                                            <div
                                                class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/10 via-black/40 to-black/60">
                                            </div>
                                            <div class="absolute inset-x-0 bottom-0 w-full p-4 space-y-2">
                                                <h6 class="text-2xl leading-tight text-white">
                                                    Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan
                                                    Limbah Menjadi Produk Bernilai Jual
                                                </h6>
                                                <p class="text-lg font-light text-white/80">
                                                    September 3, 2024
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="block lg:hidden">
                                    <a href="https://kotomesjid.com/publikasi/berita/tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual"
                                        class="flex flex-row space-x-5 space-y-0 sequenced">
                                        <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                            <img src="https://kotomesjid.com/storage/image/publication/news/tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual.jpg"
                                                alt="Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah Menjadi Produk Bernilai Jual"
                                                class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                        </div>
                                        <div class="space-y-2">
                                            <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                                title="Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah Menjadi Produk Bernilai Jual">
                                                Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah
                                                Menjadi Produk Bernilai Jual
                                            </h3>
                                            <p class="font-light text-black">
                                                September 3, 2024
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="https://kotomesjid.com/publikasi/berita/peta-statistik-kependudukan-desa-koto-mesjid"
                                class="flex flex-row space-x-5 space-y-0 sequenced">
                                <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                    <img src="https://kotomesjid.com/storage/image/publication/news/pemetaan-statistik-penduduk-desa-koto-mesjid.png"
                                        alt="Peta Statistik Kependudukan Kelurahan Tuwung"
                                        class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                        title="Peta Statistik Kependudukan Kelurahan Tuwung">
                                        Peta Statistik Kependudukan Kelurahan Tuwung
                                    </h3>
                                    <p class="font-light text-black">
                                        Agustus 19, 2024
                                    </p>
                                </div>
                            </a>
                            <a href="https://kotomesjid.com/publikasi/berita/desa-koto-mesjid-lolos-3-besar-lomba-desa-dan-kelurahan-regional-1-wilayah-sumatera-tahun-2023"
                                class="flex flex-row space-x-5 space-y-0 sequenced">
                                <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                    <img src="https://kotomesjid.com/storage/image/publication/news/desa-koto-mesjid-lolos-3-besar-lomba-desa-dan-kelurahan-regional-1-wilayah-sumatera-tahun-2023.jpg"
                                        alt="Kelurahan Tuwung Lolos 3 Besar Lomba Desa dan Kelurahan Regional 1 Wilayah Sumatera Tahun 2023"
                                        class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                        title="Kelurahan Tuwung Lolos 3 Besar Lomba Desa dan Kelurahan Regional 1 Wilayah Sumatera Tahun 2023">
                                        Kelurahan Tuwung Lolos 3 Besar Lomba Desa dan Kelurahan Regional 1
                                        Wilayah Sumatera Tahun 2023
                                    </h3>
                                    <p class="font-light text-black">
                                        Agustus 16, 2023
                                    </p>
                                </div>
                            </a>
                            <a href="https://kotomesjid.com/publikasi/berita/desa-koto-mesjid-raih-juara-1-lomba-desa-dan-kelurahan-tingkat-nasional-regional-1-wilayah-sumatera-tahun-2023"
                                class="flex flex-row space-x-5 space-y-0 sequenced">
                                <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                    <img src="https://kotomesjid.com/storage/image/publication/news/desa-koto-mesjid-raih-juara-1-lomba-desa-dan-kelurahantingkat-regional-1-nasional-tahun-2023.jpg"
                                        alt="Kelurahan Tuwung Raih Juara 1 Lomba Desa
dan Kelurahan Tingkat Nasional Regional 1 Wilayah Sumatera Tahun 2023"
                                        class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                        title="Kelurahan Tuwung Raih Juara 1 Lomba Desa
dan Kelurahan Tingkat Nasional Regional 1 Wilayah Sumatera Tahun 2023">
                                        Kelurahan Tuwung Raih Juara 1 Lomba Desa
                                        dan Kelurahan Tingkat Nasional Regional 1 Wilayah Sumatera Tahun 2023
                                    </h3>
                                    <p class="font-light text-black">
                                        Agustus 16, 2023
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-10">
                        <div id="sub-title" class="flex items-center justify-between">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                pengumuman
                            </h6>
                            <a href="https://kotomesjid.com/publikasi/pengumuman"
                                class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                Lihat semua
                            </a>
                        </div>
                        <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 gap-x-14 lg:gap-y-0">
                            <a href="https://kotomesjid.com/publikasi/pengumuman/pengumuman-dirut-pt-bkse"
                                class="flex flex-row space-x-5 space-y-0 sequenced lg:flex-col md:space-x-8 lg:space-y-5 lg:space-x-0">
                                <div class="flex-shrink-0 w-32 h-20 md:w-64 md:h-36 lg:w-full lg:h-64">
                                    <img src="https://kotomesjid.com/storage/image/publication/announcement/pengumuman-dirut-pt-bkse.png"
                                        alt="Pengumuman Dirut PT. BKSE"
                                        class="object-cover w-full h-full border-2 border-black rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-xl leading-snug line-clamp-3" title="Pengumuman Dirut PT. BKSE">
                                        Pengumuman Dirut PT. BKSE
                                    </h3>
                                    <p class="font-light text-black">
                                        Februari 14, 2025
                                    </p>
                                </div>
                            </a>
                            <a href="https://kotomesjid.com/publikasi/pengumuman/pengumuman-penerimaan-seleksi-calon-komisaris-pt-bumi-kampar-sarana-energi-perseroda"
                                class="flex flex-row space-x-5 space-y-0 sequenced lg:flex-col md:space-x-8 lg:space-y-5 lg:space-x-0">
                                <div class="flex-shrink-0 w-32 h-20 md:w-64 md:h-36 lg:w-full lg:h-64">
                                    <img src="https://kotomesjid.com/storage/image/publication/announcement/pengumuman-penerimaan-seleksi-calon-komisaris-pt-bumi-kampar-sarana-energi-perseroda.png"
                                        alt="Pengumuman Penerimaan Seleksi Calon Komisaris PT. Bumi Kampar Sarana Energi (PERSERODA)"
                                        class="object-cover w-full h-full border-2 border-black rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-xl leading-snug line-clamp-3"
                                        title="Pengumuman Penerimaan Seleksi Calon Komisaris PT. Bumi Kampar Sarana Energi (PERSERODA)">
                                        Pengumuman Penerimaan Seleksi Calon Komisaris PT. Bumi Kampar Sarana
                                        Energi (PERSERODA)
                                    </h3>
                                    <p class="font-light text-black">
                                        Februari 14, 2025
                                    </p>
                                </div>
                            </a>
                            <a href="https://kotomesjid.com/publikasi/pengumuman/pengumuman-seleksi-direktur-operasional-bpr"
                                class="flex flex-row space-x-5 space-y-0 sequenced lg:flex-col md:space-x-8 lg:space-y-5 lg:space-x-0">
                                <div class="flex-shrink-0 w-32 h-20 md:w-64 md:h-36 lg:w-full lg:h-64">
                                    <img src="https://kotomesjid.com/storage/image/publication/announcement/pengumuman-seleksi-direktur-operasional-bpr.png"
                                        alt="Pengumuman Seleksi Direktur Operasional BPR"
                                        class="object-cover w-full h-full border-2 border-black rounded-md md:rounded-lg lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-xl leading-snug line-clamp-3"
                                        title="Pengumuman Seleksi Direktur Operasional BPR">
                                        Pengumuman Seleksi Direktur Operasional BPR
                                    </h3>
                                    <p class="font-light text-black">
                                        Februari 14, 2025
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-10">
                        <div id="sub-title" class="flex items-center justify-between">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                galeri gambar
                            </h6>
                            <a href="https://kotomesjid.com/publikasi/galeri-gambar"
                                class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                Lihat semua
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-0 gap-y-10 md:gap-10 lg:gap-x-14">
                            <a href="#"
                                wire:click.prevent="$emit('openModal', 'guest.publication.image-gallery.show', {&quot;imageGallery&quot;:{&quot;id&quot;:4,&quot;title&quot;:&quot;Prosedur permintaan data &quot;,&quot;slug&quot;:&quot;prosedur-permintaan-data&quot;,&quot;thumbnail&quot;:&quot;prosedur-permintaan-data.png&quot;,&quot;published_at&quot;:&quot;2024-09-30T17:00:00.000000Z&quot;,&quot;created_at&quot;:&quot;2024-10-16T02:12:06.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-10-16T02:12:06.000000Z&quot;,&quot;deleted_at&quot;:null}})"
                                class="relative overflow-hidden rounded-lg sequenced lg:rounded-xl">
                                <div class="relative flex-shrink-0 w-full h-[400px]">
                                    <img src="https://kotomesjid.com/storage/image/publication/image-gallery/thumbnail/prosedur-permintaan-data.png"
                                        alt="Prosedur permintaan data " class="object-cover w-full h-full">
                                    <div
                                        class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/50 via-black/50 to-black/75">
                                    </div>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 w-full px-6 py-3 space-y-2">
                                    <h3 class="text-xl leading-snug text-white">
                                        Prosedur permintaan data
                                    </h3>
                                    <p class="font-light text-white/80">
                                        Oktober 1, 2024
                                    </p>
                                </div>
                            </a>
                            <a href="#"
                                wire:click.prevent="$emit('openModal', 'guest.publication.image-gallery.show', {&quot;imageGallery&quot;:{&quot;id&quot;:5,&quot;title&quot;:&quot;Infografis data penduduk Desa Koto Mesjid&quot;,&quot;slug&quot;:&quot;infografis-data-penduduk-desa-koto-mesjid&quot;,&quot;thumbnail&quot;:&quot;infografis-data-penduduk-desa-koto-mesjid.png&quot;,&quot;published_at&quot;:&quot;2024-09-30T17:00:00.000000Z&quot;,&quot;created_at&quot;:&quot;2024-10-16T02:13:20.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-10-16T02:13:20.000000Z&quot;,&quot;deleted_at&quot;:null}})"
                                class="relative overflow-hidden rounded-lg sequenced lg:rounded-xl">
                                <div class="relative flex-shrink-0 w-full h-[400px]">
                                    <img src="https://kotomesjid.com/storage/image/publication/image-gallery/thumbnail/infografis-data-penduduk-desa-koto-mesjid.png"
                                        alt="Infografis data penduduk Kelurahan Tuwung"
                                        class="object-cover w-full h-full">
                                    <div
                                        class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/50 via-black/50 to-black/75">
                                    </div>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 w-full px-6 py-3 space-y-2">
                                    <h3 class="text-xl leading-snug text-white">
                                        Infografis data penduduk Kelurahan Tuwung
                                    </h3>
                                    <p class="font-light text-white/80">
                                        Oktober 1, 2024
                                    </p>
                                </div>
                            </a>
                            <a href="#"
                                wire:click.prevent="$emit('openModal', 'guest.publication.image-gallery.show', {&quot;imageGallery&quot;:{&quot;id&quot;:3,&quot;title&quot;:&quot;Road Trip Destinasi Wisata Desa Koto Mesjid&quot;,&quot;slug&quot;:&quot;road-trip-destinasi-wisata-desa-koto-mesjid&quot;,&quot;thumbnail&quot;:&quot;road-trip-destinasi-wisata-desa-koto-mesjid.png&quot;,&quot;published_at&quot;:&quot;2024-08-18T17:00:00.000000Z&quot;,&quot;created_at&quot;:&quot;2024-08-19T01:42:15.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-08-19T01:42:15.000000Z&quot;,&quot;deleted_at&quot;:null}})"
                                class="relative overflow-hidden rounded-lg sequenced lg:rounded-xl">
                                <div class="relative flex-shrink-0 w-full h-[400px]">
                                    <img src="https://kotomesjid.com/storage/image/publication/image-gallery/thumbnail/road-trip-destinasi-wisata-desa-koto-mesjid.png"
                                        alt="Road Trip Destinasi Wisata Kelurahan Tuwung"
                                        class="object-cover w-full h-full">
                                    <div
                                        class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/50 via-black/50 to-black/75">
                                    </div>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 w-full px-6 py-3 space-y-2">
                                    <h3 class="text-xl leading-snug text-white">
                                        Road Trip Destinasi Wisata Kelurahan Tuwung
                                    </h3>
                                    <p class="font-light text-white/80">
                                        Agustus 19, 2024
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-10">
                        <div id="sub-title" class="flex items-center justify-between">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                galeri video
                            </h6>
                            <a href="https://kotomesjid.com/publikasi/galeri-vidio"
                                class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                Lihat semua
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-10 lg:gap-x-14">
                            <a href="#"
                                wire:click.prevent="$emit('openModal', 'guest.publication.video-gallery.show', {&quot;videoGallery&quot;:{&quot;id&quot;:8,&quot;title&quot;:&quot;Ngebolang Lagi di Kampung Patin&quot;,&quot;slug&quot;:&quot;ngebolang-lagi-di-kampung-patin&quot;,&quot;thumbnail&quot;:&quot;ngebolang-lagi-di-kampung-patin.png&quot;,&quot;video_source&quot;:&quot;https:\/\/www.youtube.com\/embed\/4AXLVGhP054&quot;,&quot;published_at&quot;:&quot;2022-12-28T17:00:00.000000Z&quot;,&quot;created_at&quot;:&quot;2022-12-28T18:57:39.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-12-28T18:57:39.000000Z&quot;,&quot;deleted_at&quot;:null}})"
                                class="space-y-5 group sequenced">
                                <div class="relative w-full h-52 md:h-56 lg:h-80">
                                    <div
                                        class="absolute inset-0 z-[1] w-full h-full rounded-md md:rounded-lg lg:rounded-xl bg-gradient-to-br from-black/60 to-black/30 grid place-content-center">
                                        <div
                                            class="grid w-20 h-20 transition duration-300 border-4 rounded-full border-white/60 group-hover:border-white place-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="transition duration-300 text-white/60 group-hover:text-white w-14 h-14"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from
                                                    https://tabler-icons.io/i/player-play</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 4v16l13 -8z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="https://kotomesjid.com/storage/image/publication/video-gallery/ngebolang-lagi-di-kampung-patin.png"
                                        alt="Ngebolang Lagi di Kampung Patin"
                                        class="relative object-cover w-full h-full rounded-md lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-xl leading-snug line-clamp-3" title="Ngebolang Lagi di Kampung Patin">
                                        Ngebolang Lagi di Kampung Patin
                                    </h3>
                                    <p class="font-light black">
                                        Desember 29, 2022
                                    </p>
                                </div>
                            </a>
                            <a href="#"
                                wire:click.prevent="$emit('openModal', 'guest.publication.video-gallery.show', {&quot;videoGallery&quot;:{&quot;id&quot;:6,&quot;title&quot;:&quot;Kegiatan HDCI dan Jejak Petualang di kampung Patin Desa Koto Mesjid&quot;,&quot;slug&quot;:&quot;kegiatan-hdci-dan-jejak-petualang-di-kampung-patin-desa-koto-mesjid&quot;,&quot;thumbnail&quot;:&quot;kegiatan-hdci-dan-jejak-petualang-di-kampung-patin-desa-koto-mesjid.jpg&quot;,&quot;video_source&quot;:&quot;https:\/\/www.youtube.com\/embed\/4v2Wo8kpKQo&quot;,&quot;published_at&quot;:&quot;2022-08-03T17:00:00.000000Z&quot;,&quot;created_at&quot;:&quot;2022-08-03T18:59:14.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-08-03T18:59:14.000000Z&quot;,&quot;deleted_at&quot;:null}})"
                                class="space-y-5 group sequenced">
                                <div class="relative w-full h-52 md:h-56 lg:h-80">
                                    <div
                                        class="absolute inset-0 z-[1] w-full h-full rounded-md md:rounded-lg lg:rounded-xl bg-gradient-to-br from-black/60 to-black/30 grid place-content-center">
                                        <div
                                            class="grid w-20 h-20 transition duration-300 border-4 rounded-full border-white/60 group-hover:border-white place-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="transition duration-300 text-white/60 group-hover:text-white w-14 h-14"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from
                                                    https://tabler-icons.io/i/player-play</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 4v16l13 -8z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="https://kotomesjid.com/storage/image/publication/video-gallery/kegiatan-hdci-dan-jejak-petualang-di-kampung-patin-desa-koto-mesjid.jpg"
                                        alt="Kegiatan HDCI dan Jejak Petualang di kampung Patin Kelurahan Tuwung"
                                        class="relative object-cover w-full h-full rounded-md lg:rounded-xl">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-xl leading-snug line-clamp-3"
                                        title="Kegiatan HDCI dan Jejak Petualang di kampung Patin Kelurahan Tuwung">
                                        Kegiatan HDCI dan Jejak Petualang di kampung Patin Kelurahan Tuwung
                                    </h3>
                                    <p class="font-light black">
                                        Agustus 4, 2022
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
