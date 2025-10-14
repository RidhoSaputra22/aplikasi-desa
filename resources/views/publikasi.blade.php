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
            @if (!$data->isEmpty() && !$latest->isEmpty())
                <section id="content" class="relative">
                    <div class="max-w-6xl py-20 pt-0 mx-auto space-y-32 lg:pt-20">
                        <div class="space-y-10">
                            <div id="sub-title" class="flex items-center justify-between">
                                <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                    berita
                                </h6>
                                <a href="{{ route('publikasi.cari') }}"
                                    class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                    Lihat semua
                                </a>
                            </div>
                            <div class="grid grid-cols-1 gap-8 md:gap-10 lg:grid-cols-2">
                                <div class="row-span-1 lg:row-span-3">
                                    <div class="hidden lg:block">
                                        <a href="{{ route('publikasi.berita', ['slug' => $latest[0]->slug]) }}"
                                            class="sequenced">
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
                                    </div>
                                    <div class="block lg:hidden">
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
                                    </div>
                                </div>
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
                            </div>
                        </div>
                        <div class="space-y-10">
                            <div id="sub-title" class="flex items-center justify-between">
                                <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                    Berita Lainnya
                                </h6>
                                <a href="{{ route('publikasi.cari') }}"
                                    class="text-lg font-light text-black transition hover:underline underline-offset-4">
                                    Lihat semua
                                </a>
                            </div>
                            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 gap-x-14 lg:gap-y-0">
                                @forelse ($data as $item)
                                    <a href="{{ route('publikasi.berita', ['slug' => $item->slug]) }}   "
                                        class="flex flex-row space-x-5 space-y-0 sequenced lg:flex-col md:space-x-8 lg:space-y-5 lg:space-x-0">
                                        <div class="flex-shrink-0 w-32 h-20 md:w-64 md:h-36 lg:w-full lg:h-64">
                                            <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                                                class="object-cover w-full h-full border-2 border-black rounded-md md:rounded-lg lg:rounded-xl">
                                        </div>
                                        <div class="space-y-2">
                                            <h3 class="text-xl leading-snug line-clamp-3" title="{{ $item->judul }}">
                                                {{ $item->judul }}
                                            </h3>
                                            <p class="font-light text-black">
                                                {{ $item->created_at->format('F j, Y') }}
                                            </p>
                                        </div>
                                    </a>
                                @empty
                                    <p>
                                        Tak ada data
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            @else
            @endif
        </div>


        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
