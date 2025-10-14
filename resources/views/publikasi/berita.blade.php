@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        {{-- Main Content --}}
        <div class="flex-1 px-6 md:px-10 lg:px-20">
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20"></div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20"></div>
                </div>
                <div class="relative z-[1] py-20 pb-10 pt-32 mx-auto space-y-8 max-w-screen-xl lg:pt-44">
                    <div class="w-full lg:max-w-5xl">
                        <h1 class="text-4xl font-bold leading-tight capitalize md:text-6xl md:leading-[1.15] title"
                            data-sr-id="0"
                            style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1), transform 1s cubic-bezier(0.5, 0, 0, 1);">
                            {{ $data->judul }}
                        </h1>
                        <p class="mt-5 text-lg font-light text-slate-600 published" data-sr-id="2"
                            style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.4s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.4s;">
                            Dipublikasikan pada tanggal {{ $data->created_at->format('F j, Y') }}
                        </p>
                    </div>
                </div>
            </section>
            <section id="content" class="relative" data-sr-id="3"
                style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.4s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.4s;">
                <div class="max-w-screen-xl pt-0 pb-20 mx-auto">
                    <div class="grid grid-cols-1 gap-y-20 gap-x-0 lg:grid-cols-5 lg:gap-y-0 lg:gap-x-24">
                        <div class="col-span-1 space-y-5 md:space-y-10 lg:col-span-3">
                            <img src="{{ $data->gambar }}"
                                alt="Tim PPK Ormawa BEM Fikom Umri Ciptakan Inovasi Pengolahan Limbah Menjadi Produk Bernilai Jual"
                                class="object-cover w-full h-72 md:h-[450px] rounded-2xl">
                            <div class="font-light leading-relaxed prose-xl ck-content ck-custom">
                                {!! $data->isi !!}
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-2">
                            <div class="space-y-10">
                                <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase title">
                                    berita lainnya
                                </h6>
                                <h6>
                                    <div class="space-y-10">
                                        @forelse ($latest as $item)
                                            <a href="{{ route('publikasi.berita', $item->slug) }}"
                                                class="flex space-x-5 space-y-0 lg:space-x-8 sequenced">
                                                <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                                    <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                                                        class="relative object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                                                </div>
                                                <div class="space-y-2">
                                                    <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                                        title="{{ $item->judul }}">
                                                        {{ $item->judul }}
                                                    </h3>
                                                    <p class="font-light text-black">
                                                        {{ $item->created_at->format('F j, Y') }}
                                                    </p>
                                                </div>
                                            </a>

                                        @empty
                                        @endforelse
                                    </div>
                                </h6>
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
