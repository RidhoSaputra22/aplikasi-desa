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
                    <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                        <h1 class="text-6xl font-bold text-center capitalize md:text-8xl title">
                            surat online
                        </h1>
                        <p class="text-xl font-light leading-relaxed text-center description">
                            Dengan adanya surat online, sekarang jadi lebih mudah untuk melakukan pengurusan
                            berbagai surat tanpa harus pergi kekantor desa
                        </p>
                    </div>
                </div>
            </section>
            <section id="info" class="relative">
                <div class="relative px-6 md:px-10">
                    <div
                        class="max-w-6xl py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                        <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 ">
                            <img src="{{ asset('storage/assets/surat-0.png') }}" alt="tentukan surat online"
                                class="object-cover w-full border-4 border-green-600 rounded-xl title h-80 lg:h-96">
                            <div class="place-self-center">
                                <h1
                                    class="text-2xl font-light leading-snug text-center text-black lg:leading-tight lg:text-4xl lg:text-left description">
                                    Pilih terlebih dahulu jenis surat online yang akan dilakukan pengurusan
                                </h1>
                            </div>
                            <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                                <img src="{{ asset('storage/assets/surat-1.png') }}" alt="tentukan surat online"
                                    class="object-cover w-full border-4 border-green-600 rounded-xl title h-80 lg:h-96">
                                <div class="place-self-center">
                                    <h1
                                        class="text-2xl font-light leading-snug text-center text-black lg:leading-tight lg:text-4xl lg:text-left description">
                                        Isi formulir serta unggah lampiran persyaratan dengan lengkap dan benar
                                    </h1>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                                <img src="{{ asset('storage/assets/surat-2.png') }}" alt="tentukan surat online"
                                    class="object-cover w-full border-4 border-green-600 rounded-xl title h-80 lg:h-96">
                                <div class="place-self-center">
                                    <h1
                                        class="text-2xl font-light leading-snug text-center text-black lg:leading-tight lg:text-4xl lg:text-left description">
                                        Unduh bukti pembuatan surat keterangan untuk memonitoring perjalanan status
                                        surat yang sedang dibuat
                                    </h1>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                                <img src="{{ asset('storage/assets/surat-3.png') }}" alt="tentukan surat online"
                                    class="object-cover w-full border-4 border-green-600 rounded-xl title h-80 lg:h-96">
                                <div class="place-self-center">
                                    <h1
                                        class="text-2xl font-light leading-snug text-center text-black lg:leading-tight lg:text-4xl lg:text-left description">
                                        Sambil menunggu petugas desa melakukan verifikasi data, lakukan monitoring
                                        surat dengan scan qrcode yang ada pada bukti pembuatan surat
                                    </h1>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                                <img src="{{ asset('storage/assets/surat-4.png') }}" alt="tentukan surat online"
                                    class="object-cover w-full border-4 border-green-600 rounded-xl title h-80 lg:h-96">
                                <div class="place-self-center">
                                    <h1
                                        class="text-2xl font-light leading-snug text-center text-black lg:leading-tight lg:text-4xl lg:text-left description">
                                        Setelah data dikonfirmasi valid oleh petugas, surat dapat diunduh
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <section id="certificate" class="relative">
                <div class="relative px-6 overflow-hidden bg-green-600 md:px-10">
                    <div class="max-w-6xl py-32 mx-auto space-y-20 relative z-[1]">
                        <div class="w-full mx-auto lg:w-2/3">
                            <h1 class="text-4xl font-light leading-tight text-center text-white title">
                                Tentukan dan coba pengurusan surat online sekarang
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.domisili' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.birth' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.death' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.penghasilanOrtu' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.tidakMampu' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.certificate.usaha' })"
                                    class="px-4 py-2 text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat surat <span class="hidden md:inline-block">sekarang</span>
                                </a>
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
