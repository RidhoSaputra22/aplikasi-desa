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
                <section class="">
                    <div class="flex justify-center">
                        <div class="py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                            <div class="">
                                <h2 class="text-left text-4xl font-semibold mb-10">Data Ditemukan</h2>

                                <!-- TABLE VIEW (Desktop) -->
                                <div class="pt-4 overflow-x-auto border rounded-lg hidden md:block">
                                    <table class="">
                                        <thead class="uppercase">
                                            <tr>
                                                <th class="px-4 py-3 text-left">NIK</th>
                                                <th class="px-4 py-3 text-left">Nama Lengkap</th>
                                                <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                                                <th class="px-4 py-3 text-left">Tanggal Lahir</th>
                                                <th class="px-4 py-3 text-left">Penghasilan Bulanan</th>
                                                <th class="px-4 py-3 text-left">Kategori Kemiskinan</th>
                                                <th class="px-4 py-3 text-left">Jenis Bantuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b hover:bg-gray-50">
                                                <td class="px-4 py-3">{{ session('success')['nik'] }}</td>
                                                <td class="px-4 py-3">{{ session('success')['nama_lengkap'] }}</td>
                                                <td class="px-4 py-3">{{ session('success')['jenis_kelamin'] }}</td>
                                                <td class="px-4 py-3">{{ session('success')['tanggal_lahir'] }}</td>
                                                <td class="px-4 py-3">Rp.
                                                    {{ number_format(session('success')['penghasilan_bulanan']) }}</td>
                                                <td class="px-4 py-3">{{ session('success')['kategori_kemiskinan'] }}</td>
                                                <td class="px-4 py-3">{{ session('success')['jenis_bantuan'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- CARD VIEW (Mobile) -->
                                <div class="block md:hidden">
                                    <div class="border rounded-lg p-4 shadow-sm space-y-3">
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">NIK</p>
                                            <p class="font-semibold">{{ session('success')['nik'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Nama Lengkap</p>
                                            <p class="font-semibold">{{ session('success')['nama_lengkap'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Jenis Kelamin</p>
                                            <p class="font-semibold">{{ session('success')['jenis_kelamin'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Tanggal Lahir</p>
                                            <p class="font-semibold">{{ session('success')['tanggal_lahir'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Penghasilan Bulanan</p>
                                            <p class="font-semibold">Rp.
                                                {{ number_format(session('success')['penghasilan_bulanan']) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Kategori Kemiskinan</p>
                                            <p class="font-semibold">{{ session('success')['kategori_kemiskinan'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 uppercase">Jenis Bantuan</p>
                                            <p class="font-semibold">{{ session('success')['jenis_bantuan'] }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
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
        <section id="public-complaint" class="relative">
            <div class="relative px-6 overflow-hidden bg-green-600 md:px-10">
                <div class="max-w-6xl py-20 mx-auto relative z-[1]">
                    <div class="w-full mx-auto lg:w-2/3">
                        <h1 class="text-4xl font-light leading-tight text-center text-white title">
                            Belum terdaftar sebagai Penduduk? Input Data Anda Sekarang
                        </h1>
                        <div class="flex justify-center mt-12 description">
                            <a href="#"
                                onclick="Livewire.dispatch('openModal', { component: 'guest.penduduk.input', arguments: { link: '/cek-data' }  })"
                                class="px-6 py-3 text-lg text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                Input Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
