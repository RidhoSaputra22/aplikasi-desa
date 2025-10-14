@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        {{-- Main Content --}}
        <div class="flex-1">
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20">
                    </div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20">
                    </div>
                </div>
                <div class="px-6 md:px-10 lg:px-20">
                    <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 w-full lg:max-w-4xl lg:pt-44">
                        <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                            404
                        </h1>
                        <p class="text-xl font-light leading-relaxed text-center description">
                            Maaf, halaman yang Anda cari tidak ditemukan. Silakan periksa kembali URL atau kembali ke
                            beranda.
                        </p>
                        <div class="text-center">
                            <a href="{{ url('/') }}"
                                class="inline-block px-6 py-3 text-lg font-medium text-white bg-[#33AC3E] rounded hover:bg-[#28a745] transition duration-300">
                                Kembali ke Beranda
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
