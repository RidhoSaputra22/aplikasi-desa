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
                    <h1 class="text-6xl font-bold text-center capitalize md:text-8xl title">
                        pariwisata
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        Temukan lokasi-lokasi menarik yang anda bisa kunjungi untuk menemani libur pekan anda di
                        kelurahan tuwung
                    </p>
                </div>
            </section>
            <section id="content" class="relative">
                <div class="max-w-6xl py-20 pt-0 mx-auto lg:pt-20">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-3 md:gap-10 lg:gap-12">
                        @forelse ($data as $item)
                            <a href="{{ route('parawisata.detail', $item->slug) }}">
                                <div class="space-y-3">
                                    <div class="relative w-full overflow-hidden h-80 rounded-xl">
                                        <img src="{{ Storage::url($item->gambar) }}" alt="puncak-kobe"
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
                        @endforelse

                    </div>
                </div>
            </section>
        </div>
        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
