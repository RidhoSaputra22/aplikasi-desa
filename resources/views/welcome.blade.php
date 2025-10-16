@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        {{-- Main Content --}}
        <div class="flex-1">
            <section id="hero" class="w-full h-[650px]">
                <div class="w-full h-full swiper">
                    <div class="w-full h-full swiper-wrapper">
                        <div class="relative w-full h-full swiper-slide">
                            <img src="{{ asset('storage/banner/banner-1.jpg') }}" alt="kelurahan tuwung"
                                class="object-cover w-full h-full">
                            <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/30 to-transparent">
                            </div>
                            <div class="absolute inset-0 w-full h-full px-6 md:px-10 lg:px-20">
                                <div class="grid h-full max-w-4xl mx-auto place-content-center">
                                    <h1
                                        class="text-6xl font-semibold tracking-tighter text-center text-white capitalize break-words md:text-8xl">
                                        selamat datang di website desa Kelurahan Tuwung
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full h-full swiper-slide">
                            <img src="{{ asset('storage/banner/banner-2.jpg') }}" alt="kantor kelurahan tuwung"
                                class="object-cover w-full h-full">
                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-black/50 via-black/50 to-black/25">
                            </div>
                            <div class="absolute inset-0 w-full h-full px-6 md:px-10 lg:px-40">
                                <div class="flex items-center h-full max-w-6xl mx-auto">
                                    <div class="space-y-8">
                                        <h1
                                            class="text-6xl font-semibold tracking-tighter text-center text-white capitalize break-words lg:text-left md:text-8xl">
                                            surat online
                                        </h1>
                                        <div class="grid grid-cols-1 lg:grid-cols-2">
                                            <div class="px-10 lg:px-0">
                                                <p
                                                    class="text-xl font-light leading-snug text-center text-white md:text-2xl lg:text-left">
                                                    Dengan adanya surat online, sekarang jadi lebih mudah untuk
                                                    melakukan pengurusan berbagai surat tanpa harus pergi
                                                    kekantor desa
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center lg:justify-start">
                                            <a href="{{ route('surat-online') }}"
                                                class="flex items-center justify-center px-4 py-2 space-x-2 text-lg text-white transition bg-green-600 border border-green-600 rounded-md w-fit hover:bg-green-600/95 focus:ring-4 focus:ring-green-400">
                                                Pelajari lebih lanjut
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full h-full swiper-slide">
                            <img src="{{ asset('storage/banner/banner-3.jpg') }}"
                                alt="salah satu bangunan di kelurahan tuwung" class="object-cover w-full h-full">
                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-l from-black/50 via-black/50 to-black/25">
                            </div>
                            <div class="absolute inset-0 w-full h-full px-6 md:px-10 lg:px-40">
                                <div class="flex items-center justify-center h-full max-w-6xl mx-auto">
                                    <div class="space-y-8">
                                        <h1
                                            class="text-6xl font-semibold tracking-tighter text-center text-white capitalize break-words md:text-8xl">
                                            pengaduan masyarakat
                                        </h1>
                                        <div class="w-full px-10 mx-auto lg:w-1/2 lg:px-0">
                                            <p class="text-xl font-light leading-snug text-center text-white md:text-2xl">
                                                Laporkan segala pengaduan anda seputar permasalahan yang ada di
                                                kelurahan tuwung, petugas akan menindaklanjuti pengaduan dengan
                                                cepat dan tanggap
                                            </p>
                                        </div>
                                        <div class="flex justify-center">
                                            <a href="{{ route('pengaduan-masyarakat') }}"
                                                class="flex items-center justify-center px-4 py-2 space-x-2 text-lg text-white transition bg-green-600 border border-green-600 rounded-md w-fit hover:bg-green-600/95 focus:ring-4 focus:ring-green-400">
                                                Pelajari lebih lanjut
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full h-full swiper-slide">
                            <img src="{{ asset('storage/banner/banner-1.jpg') }}" alt="kantor kelurahan tuwung"
                                class="object-cover w-full h-full">
                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-black/50 via-black/50 to-black/25">
                            </div>
                            <div class="absolute inset-0 w-full h-full px-6 md:px-10 lg:px-20">
                                <div class="flex items-center h-full max-w-6xl mx-auto">
                                    <div class="space-y-8">
                                        <h1
                                            class="text-6xl font-semibold tracking-tighter text-center text-white capitalize break-words lg:text-right md:text-8xl">
                                            pariwisata
                                        </h1>
                                        <div class="grid grid-cols-1 lg:grid-cols-2">
                                            <div></div>
                                            <div class="px-10 lg:px-0">
                                                <p
                                                    class="text-xl font-light leading-snug text-center text-white md:text-2xl lg:text-right">
                                                    Temukan lokasi-lokasi menarik yang anda bisa kunjungi untuk
                                                    menemani libur pekan anda di kelurahan tuwung
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center lg:justify-end">
                                            <a href="{{ route('parawisata') }}"
                                                class="flex items-center justify-center px-4 py-2 space-x-2 text-lg text-white transition bg-green-600 border border-green-600 rounded-md w-fit hover:bg-green-600/95 focus:ring-4 focus:ring-green-400">
                                                Lihat selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full h-full swiper-slide">
                            <img src="{{ asset('storage/banner/banner-2.jpg') }}" alt="produk umkm"
                                class="object-cover w-full h-full">
                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-l from-black/50 via-black/50 to-black/25">
                            </div>
                            <div class="absolute inset-0 w-full h-full px-6 md:px-10 lg:px-40">
                                <div class="flex items-center justify-center h-full max-w-6xl mx-auto">
                                    <div class="space-y-8">
                                        <h1
                                            class="text-6xl font-semibold tracking-tighter text-center text-white capitalize break-words md:text-8xl">
                                            produk umkm
                                        </h1>
                                        <div class="w-full px-10 mx-auto lg:w-1/2 lg:px-0">
                                            <p class="text-xl font-light leading-snug text-center text-white md:text-2xl">
                                                Temukan berbagai produk kreatif dari badan usaha unit mikro
                                                kecil menengah (UMKM) kelurahan tuwung
                                            </p>
                                        </div>
                                        <div class="flex justify-center">
                                            <a href="{{ route('produk-umkm') }}"
                                                class="flex items-center justify-center px-4 py-2 space-x-2 text-lg text-white transition bg-green-600 border border-green-600 rounded-md w-fit hover:bg-green-600/95 focus:ring-4 focus:ring-green-400">
                                                Lihat selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="absolute top-0 left-0 lg:left-5 w-14 h-full button-prev z-[1] grid place-content-center">
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 text-white rounded-full cursor-pointer bg-black/30 hover:bg-black/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="15 6 9 12 15 18"></polyline>
                            </svg>
                        </a>
                    </div>
                    <div class="absolute top-0 right-0 lg:right-5 w-14 h-full button-next z-[1] grid place-content-center">
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 text-white rounded-full cursor-pointer bg-black/30 hover:bg-black/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="9 6 15 12 9 18"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
            <section id="opening" class="relative">
                <div class="px-6 md:px-10">
                    <div class="max-w-6xl py-32 mx-auto">
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:gap-10">
                            <div class="order-2 space-y-10 lg:order-1">
                                <h3
                                    class="text-lg font-bold tracking-widest text-center text-green-600 uppercase lg:text-left title">
                                    selayang pandang
                                </h3>
                                <div class="space-y-5 text-center divide-y divide-slate-200 lg:text-left description">
                                    <p class="text-xl font-light leading-relaxed">
                                        Selamat datang di website resmi Kelurahan Tuwung. Pada kesempatan ini
                                        marilah kita ucapkan puji syukur kehadirat Allah SWT, karena atas rahmat
                                        dan karunia-nya kita telah dapat membangun, mengembangkan dan mengelola
                                        website Kelurahan Tuwung. Dengan adanya website ini diharapkan
                                        masyarakat dapat mengetahui informasi mengenai kegiatan yang dilakukan
                                        oleh Kelurahan Tuwung
                                    </p>
                                    <div class="pt-5 space-y-1">
                                        <h6 class="text-xl font-semibold">
                                            Arjunalis
                                        </h6>
                                        <p class="text-lg font-light">
                                            Lurah Kelurahan Tuwung
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="order-1 place-self-center lg:order-2 content">
                                <img src="https://kotomesjid.com/storage/image/hero/kepala-desa-koto-mesjid.png"
                                    class="w-64 lg:w-80 rounded-xl" alt="lurah-kelurahan-tuwung">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="certificate" class="relative">
                <div class="relative px-6 overflow-hidden bg-green-600 md:px-10">
                    <div class="max-w-6xl py-32 mx-auto space-y-20 relative z-[1]">
                        <div class="w-full mx-auto space-y-10 lg:w-3/4">
                            <h3 class="text-lg font-bold tracking-widest text-center text-white uppercase title">
                                surat online
                            </h3>
                            <h1 class="text-4xl font-light leading-tight text-center text-white description">
                                Dengan adanya surat online, sekarang tidak perlu lagi kekantor desa untuk
                                pengurusan
                            </h1>
                        </div>
                        <div class="grid grid-cols-2 gap-10 gap-y-10 lg:grid-cols-3 md:gap-y-20">
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/live-view
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                                    <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                                    <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                                    <line x1="12" y1="11" x2="12" y2="11.01">
                                    </line>
                                    <path d="M12 18l-3.5 -5a4 4 0 1 1 7 0l-3.5 5"></path>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Surat keterangan domisili
                                </h6>
                            </div>
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/mood-kid
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="9" y1="10" x2="9.01" y2="10">
                                    </line>
                                    <line x1="15" y1="10" x2="15.01" y2="10">
                                    </line>
                                    <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                    <path d="M12 3a2 2 0 0 0 0 4"></path>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Surat keterangan kelahiran
                                </h6>
                            </div>
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/heartbeat
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572">
                                    </path>
                                    <path d="M3 13h2l2 3l2 -6l1 3h3"></path>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Surat keterangan kematian
                                </h6>
                            </div>
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/license
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11">
                                    </path>
                                    <line x1="9" y1="7" x2="13" y2="7">
                                    </line>
                                    <line x1="9" y1="11" x2="13" y2="11">
                                    </line>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Suket penghasilan orang tua
                                </h6>
                            </div>
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/window
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 3c-3.866 0 -7 3.272 -7 7v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1 -1v-10c0 -3.728 -3.134 -7 -7 -7z">
                                    </path>
                                    <line x1="5" y1="13" x2="19" y2="13">
                                    </line>
                                    <line x1="12" y1="3" x2="12" y2="21">
                                    </line>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Surat keterangan tidak mampu
                                </h6>
                            </div>
                            <div class="flex flex-col items-center col-span-1 space-y-2 text-white sequenced">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" viewBox="0 0 24 24"
                                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <desc>Download more icon variants from
                                        https://tabler-icons.io/i/building-store</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="21" x2="21" y2="21">
                                    </line>
                                    <path
                                        d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4">
                                    </path>
                                    <line x1="5" y1="21" x2="5" y2="10.85">
                                    </line>
                                    <line x1="19" y1="21" x2="19" y2="10.85">
                                    </line>
                                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                                </svg>
                                <h6 class="text-xl font-light text-center">
                                    Surat keterangan usaha
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="publication">
                <div class="px-6 md:px-10">
                    <div class="max-w-6xl py-20 pt-10 mx-auto lg:pt-20">
                        <div class="space-y-10">
                            <h3
                                class="text-lg font-bold tracking-widest text-center text-green-600 uppercase lg:text-left title">
                                publikasi
                            </h3>
                            <div class="w-full lg:max-w-xl description">
                                <h1 class="text-4xl font-light leading-tight text-center lg:text-left">
                                    Terhubung seputar informasi kegiatan dan berita desa terkini
                                </h1>
                            </div>
                            @if ($latest->isNotEmpty())
                                <div class="grid grid-cols-1 gap-8 md:gap-10 lg:grid-cols-2">
                                    <div class="row-span-1 lg:row-span-3">
                                        <div class="hidden lg:block">
                                            @if ($latest->count() > 0)
                                                <a href="{{ route('publikasi.berita', ['slug' => $latest[0]->slug]) }}"
                                                    class="sequenced">
                                                    <div class="relative w-full overflow-hidden rounded-xl h-96">
                                                        <img src="{{ $latest[0]->gambar }}"
                                                            class="object-cover w-full h-full"
                                                            alt="tim-ppk-ormawa-bem-fikom-umri-ciptakan-inovasi-pengolahan-limbah-menjadi-produk-bernilai-jual">
                                                        <div
                                                            class="absolute inset-0 w-full h-full bg-gradient-to-br from-black/10 via-black/40 to-black/60">
                                                        </div>
                                                        <div class="absolute inset-x-0 bottom-0 w-full p-4 space-y-2">
                                                            <h6 class="text-2xl leading-tight text-white">
                                                                {{ $latest[0]->judul }}
                                                            </h6>
                                                            <p class="text-lg font-light text-white/80">
                                                                {{ $latest[0]->created_at->format('F j, Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="block lg:hidden">
                                            @if ($latest->count() > 0)
                                                <a href="{{ route('publikasi.berita', ['slug' => $latest[0]->slug]) }}"
                                                    class="flex flex-row space-x-5 space-y-0 sequenced">
                                                    <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                                        <img src="{{ $latest[0]->gambar }}"
                                                            alt="Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah Menjadi Produk Bernilai Jual"
                                                            class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                                    </div>
                                                    <div class="space-y-2">
                                                        <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                                            title="Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah Menjadi Produk Bernilai Jual">
                                                            {{ $latest[0]->judul }}
                                                        </h3>
                                                        <p class="font-light text-black">
                                                            {{ $latest[0]->created_at->format('F j, Y') }}
                                                        </p>
                                                    </div>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                    @if ($latest->count() > 1)
                                        <a href="{{ route('publikasi.berita', ['slug' => $latest[1]->slug]) }}"
                                            class="flex flex-row space-x-5 space-y-0 sequenced">
                                            <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                                <img src="{{ $latest[1]->gambar }}"
                                                    alt="Kelurahan Tuwung Lolos 3 Besar Lomba Desa dan Kelurahan Regional 1 Wilayah Sumatera Tahun 2023"
                                                    class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0">
                                                    {{ $latest[1]->judul }}
                                                </h3>
                                                <p class="font-light text-black">
                                                    {{ $latest[1]->created_at->format('F j, Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($latest->count() > 2)
                                        <a href="{{ route('publikasi.berita', ['slug' => $latest[2]->slug]) }}"
                                            class="flex flex-row space-x-5 space-y-0 sequenced">
                                            <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                                <img src="{{ $latest[2]->gambar }}"
                                                    class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0">
                                                    {{ $latest[2]->judul }}
                                                </h3>
                                                <p class="font-light text-black">
                                                    {{ $latest[2]->created_at->format('F j, Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($latest->count() > 3)
                                        <a href="{{ route('publikasi.berita', ['slug' => $latest[3]->slug]) }}"
                                            class="flex flex-row space-x-5 space-y-0 sequenced">
                                            <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                                <img src="{{ $latest[3]->gambar }}"
                                                    class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0">
                                                    {{ $latest[3]->judul }}
                                                </h3>
                                                <p class="font-light text-black">
                                                    {{ $latest[3]->created_at->format('F j, Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @else
                                <div class="">
                                    <p class="text-xl font-light leading-snug text-left description">
                                        Belum ada berita terbaru saat ini, silahkan cek kembali nanti
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section id="tourist">
                <div class="px-6 md:px-10">
                    <div class="max-w-6xl py-20 pt-10 mx-auto lg:pt-20">
                        <div class="space-y-10">
                            <h3
                                class="text-lg font-bold tracking-widest text-center text-green-600 uppercase lg:text-left title">
                                pariwisata
                            </h3>
                            <div class="w-full lg:max-w-xl description">
                                <h1 class="text-4xl font-light leading-tight text-center lg:text-left">
                                    Temukan lokasi-lokasi menarik yang anda bisa kunjungi untuk menemani libur
                                    pekan anda
                                </h1>
                            </div>
                            <div class="grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-3 md:gap-10 lg:gap-12">
                                @forelse ($parawisata as $item)
                                    <a href="{{ route('parawisata.detail', $item->slug) }}">
                                        <div class="space-y-3">
                                            <div class="relative w-full overflow-hidden h-80 rounded-xl">
                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="puncak-kobe"
                                                    class="relative object-cover w-full h-full">
                                                <div
                                                    class="absolute inset-0 grid w-full h-full rounded-xl bg-black/30 place-content-center">
                                                    <h1
                                                        class="text-3xl font-semibold leading-snug text-center text-white line-clamp-2">
                                                        {{ $item->title }}
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="">
                                        <p class="text-xl font-light leading-snug text-left description">
                                            Belum ada lokasi pariwisata saat ini, silahkan cek kembali nanti
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="product">
                <div class="px-6 md:px-10 bg-slate-50">
                    <div class="max-w-6xl py-20 pt-10 mx-auto lg:pt-20">
                        <div class="space-y-10">
                            <h3
                                class="text-lg font-bold tracking-widest text-center text-green-600 uppercase lg:text-left title">
                                umkm
                            </h3>
                            <div class="w-full lg:max-w-xl">
                                <h1 class="text-4xl font-light leading-tight text-center lg:text-left description">
                                    Mengenal lebih dekat kelurahan tuwung melalui produksi kreatif umkm
                                </h1>
                            </div>
                            <div
                                class="grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-3 md:gap-10 lg:grid-cols-4 lg:gap-12">
                                @forelse ($umkm as $item)
                                    <button
                                        onclick='Livewire.dispatch("openModal", { component: "guest.product.show" , arguments: {
                                data: @json($item) } })'>
                                        <div class="space-y-3">
                                            <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                                <img src="{{ $item->gambar }}" alt="gantungan-kunci-strowbery-rajut"
                                                    class="relative object-cover w-full h-full">
                                                <span
                                                    class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                                    {{ $item->kategoriUmkm->nama_kategori }}
                                                </span>
                                            </div>
                                            <h6 class="text-xl font-semibold text-right">
                                                Rp. {{ number_format($item->harga) }}
                                            </h6>
                                            <h4 class="text-xl font-light leading-snug">
                                                {{ $item->nama_produk }}
                                            </h4>
                                        </div>
                                    </button>

                                @empty
                                    <div class="">
                                        <p class="text-xl font-light leading-snug text-left description">
                                            Belum ada produk umkm saat ini, silahkan cek kembali nanti
                                        </p>
                                    </div>
                                @endforelse
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
