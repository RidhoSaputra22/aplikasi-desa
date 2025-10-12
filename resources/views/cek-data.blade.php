@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')

        {{-- Main Content --}}
        <div class="flex-1">
            {{-- Hero Section --}}
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20"></div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20"></div>
                </div>
                <div class="px-6 md:px-10 lg:px-20">
                    <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                        <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                            Cek Data Kamu
                        </h1>
                        <p class="text-xl font-light leading-relaxed text-center description">
                            Periksa apakah kamu terdaftar sebagai warga Kelurahan Tuwung dengan memasukkan NIK
                            kamu
                        </p>
                    </div>
                </div>
            </section>
        </div>
        @if (session('error'))
            <div class="flex-1">
                <section class="relative content">
                    <div
                        class="max-w-6xl py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                        <div
                            class="max-w-2xl px-6 md:px-10 lg:px-20 py-6 mx-auto space-y-4 border border-red-300 rounded-lg bg-red-500">
                            <h1 class="text-2xl font-semibold text-white-800 title">Pemberitahuan</h1>
                            <p class="text-lg font-light text-white-700 description">{{ session('error') }} </p>
                        </div>
                    </div>
                </section>
            </div>
        @elseif (session('success'))
            <div class="flex-1">
                <section class="relative content">
                    <div
                        class="max-w-6xl py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                        <div
                            class="max-w-2xl px-6 md:px-10 lg:px-20 py-6 mx-auto space-y-4 border border-green-300 rounded-lg bg-green-50">
                            <h1 class="text-2xl font-semibold text-green-800 title">Selamat</h1>
                            <p class="text-lg font-light text-green-700 description">Kamu telah terdaftar dan menerima
                                bantuan berupa
                                {{-- {{ dd(session('success')) }} --}}
                                {{ session('success')['data']->jenis_bantuan }} dengan kategori kemiskinan
                                {{ session('success')['data']->kategori_kemiskinan }} dari
                                kelurahan tuwung</p>
                        </div>
                    </div>
                </section>
            </div>
        @else
            <div class="flex-1">
                <section class="relative content">
                    <div
                        class="max-w-6xl py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                        <form method="GET" class="px-6 md:px-10 lg:px-20 flex flex-col max-w-2xl mx-auto space-y-6">
                            <input type="text" placeholder="Masukkan NIK Anda" name="nik"
                                class="w-full p-4 border border-gray-300 rounded-lg" />
                            <button wire:click="submit" type="submit"
                                class="mt-4 px-6 py-3 text-white bg-green-600 rounded-lg hover:bg-green-700">
                                Cek NIK
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        @endif



        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
