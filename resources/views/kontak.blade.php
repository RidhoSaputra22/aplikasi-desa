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
                        kontak
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        Cari tahu alamat kantor serta ikuti kami diberbagai media sosial untuk kemudahan
                        mendapatkan informasi seputar kelurahan tuwung
                    </p>
                </div>
            </section>
            <section id="contact" class="relative">
                <div class="max-w-screen-xl py-20 pt-0 mx-auto lg:pt-20">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:gap-20">
                        <div class="space-y-8 place-self-center">
                            <h6
                                class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left title">
                                alamat dan kontak
                            </h6>
                            <p class="text-xl font-light leading-relaxed text-center lg:text-left content">
                                Jl. Andi Asiah, asia panrenge, Kec. Barru, Kabupaten Barru, Sulawesi Selatan
                            </p>
                            <div
                                class="flex items-center justify-center order-1 mb-10 space-x-4 lg:justify-start lg:order-2 lg:mb-0 content">
                                <a href="" target="_blank" class="text-black transition hover:text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <desc>Download more icon variants from
                                            https://tabler-icons.io/i/brand-facebook</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                        </path>
                                    </svg>
                                </a>
                                <a href="" target="_blank" class="text-black transition hover:text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <desc>Download more icon variants from
                                            https://tabler-icons.io/i/brand-instagram</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="16" rx="4">
                                        </rect>
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501">
                                        </line>
                                    </svg>
                                </a>
                                <a href="" target="_blank" class="text-black transition hover:text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <desc>Download more icon variants from
                                            https://tabler-icons.io/i/brand-youtube</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="5" width="18" height="14" rx="4">
                                        </rect>
                                        <path d="M10 9l5 3l-5 3z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div wire:ignore id="map" class="h-80 w-full lg:h-[400px] rounded-xl">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="message">
                <div class="max-w-screen-xl py-20 pt-0 mx-auto lg:pt-20">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:gap-20">
                        <div class="order-2 space-y-8">
                            <h6
                                class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase title lg:text-left">
                                saran dan masukan
                            </h6>
                            <p class="text-xl font-light leading-relaxed text-center lg:text-left description">
                                Sampaikan saran dan masukkan anda untuk kemajuan layanan yang ada di kelurahan tuwung
                                pada formulir di bawah ini
                            </p>
                            <div
                                class="max-w-lg p-6 mx-auto border-2 border-green-600 form lg:ml-0 md:p-10 lg:p-14 rounded-xl">
                                <form wire:submit.prevent="submit" class="space-y-12">
                                    <div class="space-y-6">
                                        <div class="space-y-2">
                                            <label for="name" class="font-medium">
                                                Nama lengkap
                                            </label>
                                            <input type="text"
                                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                                id="name" wire:model="name" autocomplete="off">
                                        </div>
                                        <div class="space-y-2">
                                            <label for="email" class="font-medium">
                                                Email
                                            </label>
                                            <input type="text"
                                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                                id="email" wire:model="email" autocomplete="off">
                                        </div>
                                        <div>
                                            <div class="space-y-2">
                                                <label for="message" class="font-medium">
                                                    Saran dan masukan
                                                </label>
                                                <textarea
                                                    class="w-full min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                                    id="message" wire:model="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6">
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60"
                                                wire:target="submit" wire.loading.attr.disabled>
                                                <span class="font-medium tracking-wide">
                                                    Kirim
                                                </span>
                                                <svg wire:loading wire:target="submit" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 animate-spin" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                    </path>
                                                    <line x1="12" y1="6" x2="12" y2="3">
                                                    </line>
                                                    <line x1="16.25" y1="7.75" x2="18.4" y2="5.6">
                                                    </line>
                                                    <line x1="18" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="16.25" y1="16.25" x2="18.4" y2="18.4">
                                                    </line>
                                                    <line x1="12" y1="18" x2="12" y2="21">
                                                    </line>
                                                    <line x1="7.75" y1="16.25" x2="5.6" y2="18.4">
                                                    </line>
                                                    <line x1="6" y1="12" x2="3" y2="12">
                                                    </line>
                                                    <line x1="7.75" y1="7.75" x2="5.6" y2="5.6">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="order-1 hidden lg:block">
                            <img src="https://kotomesjid.com/storage/image/hero/kantor-desa-koto-mesjid.jpg"
                                alt="kantor-kelurahan-tuwung" class="object-cover w-full h-96 rounded-xl hero-image">
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
