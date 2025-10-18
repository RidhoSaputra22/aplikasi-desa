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
            @if ($latest->isNotEmpty())
                <div class="grid grid-cols-1 gap-8 md:gap-10 lg:grid-cols-2">
                    <div class="row-span-1 lg:row-span-3">
                        <div class="hidden lg:block">
                            @if ($latest->count() > 0)
                                <a href="{{ route('publikasi.berita', ['slug' => $latest[0]->slug]) }}" class="sequenced">
                                    <div class="relative w-full overflow-hidden rounded-xl h-96">
                                        <img src="{{ $latest[0]->gambar }}" class="object-cover w-full h-full"
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


        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
