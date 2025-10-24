<section id="kembali-ke-atas">
    <div
        class="absolute top-0 left-0 z-10 flex items-center justify-between w-full h-16 px-6 transition-all duration-150 md:px-10 lg:px-20 md:h-20">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="logo desa koto mesjid" class="w-10 md:w-10">
        </a>
        <div class="hidden lg:block">
            <div
                class="flex items-center justify-end space-x-5 {{ request()->routeIs('home') ? 'text-white' : 'text-black' }}">
                @php
                    $activeClass = 'text-green-600 font-semibold';
                    $inactiveClass = 'hover:text-green-600 transition';
                @endphp

                <a href="{{ route('profil-desa') }}"
                    class="tracking-wide capitalize transition {{ request()->is('profil-desa*') ? $activeClass : $inactiveClass }}">
                    profil
                </a>
                <a href="{{ route('data-desa') }}"
                    class="tracking-wide capitalize transition {{ request()->is('data-desa*') ? $activeClass : $inactiveClass }}">
                    data kelurahan
                </a>
                <a href="{{ route('cek-data') }}"
                    class="tracking-wide capitalize transition {{ request()->is('cek-data*') ? $activeClass : $inactiveClass }}">
                    cek data
                </a>
                <a href="{{ route('surat-online') }}"
                    class="tracking-wide capitalize transition {{ request()->is('surat-online*') ? $activeClass : $inactiveClass }}">
                    surat online
                </a>
                <a href="{{ route('publikasi') }}"
                    class="tracking-wide capitalize transition {{ request()->is('publikasi*') ? $activeClass : $inactiveClass }}">
                    publikasi
                </a>
                <a href="{{ route('parawisata') }}"
                    class="tracking-wide capitalize transition {{ request()->is('parawisata*') ? $activeClass : $inactiveClass }}">
                    pariwisata
                </a>
                <a href="{{ route('produk-umkm') }}"
                    class="tracking-wide capitalize transition {{ request()->is('produk-umkm*') ? $activeClass : $inactiveClass }}">
                    umkm
                </a>
                <a href="{{ route('pengaduan-masyarakat') }}"
                    class="tracking-wide capitalize transition {{ request()->is('pengaduan-masyarakat*') ? $activeClass : $inactiveClass }}">
                    pengaduan
                </a>
                <a href="{{ route('kontak') }}"
                    class="tracking-wide capitalize transition {{ request()->is('kontak*') ? $activeClass : $inactiveClass }}">
                    kontak
                </a>
            </div>
        </div>
        <div class="block lg:hidden">
            <div x-data="{ menu: false }"
                x-effect="menu ? document.querySelector('body').classList.add('overflow-hidden') : document.querySelector('body').classList.remove('overflow-hidden')"
                @keydown.escape.window="menu = false">
                <a href="#" class="transition hover:text-green-200 text-white" @click.prevent="menu = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <desc>Download more icon variants from https://tabler-icons.io/i/align-right
                        </desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="10" y1="12" x2="20" y2="12"></line>
                        <line x1="6" y1="18" x2="20" y2="18"></line>
                    </svg>
                </a>
                <div x-show="menu" class="fixed inset-0 flex flex-col w-full min-h-screen overflow-y-auto bg-white">
                    <div class="flex items-center justify-end flex-shrink-0 h-16 px-6 md:h-20 md:px-10">
                        <a href="#" class="text-red-500 transition hover:text-black"
                            @click.prevent="menu = false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/x
                                </desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </a>
                    </div>
                    <div class="px-6 py-20 md:px-10">
                        <div class="flex flex-col space-y-6 md:space-y-10">
                            <a href="{{ route('profil-desa') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                profil
                            </a>
                            <a href="{{ route('data-desa') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                data desa
                            </a>
                            <a href="{{ route('cek-data') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                cek-data
                            </a>
                            <a href="{{ route('surat-online') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                surat online
                            </a>
                            <a href="{{ route('publikasi') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                publikasi
                            </a>
                            <a href="{{ route('parawisata') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                pariwisata
                            </a>
                            <a href="{{ route('produk-umkm') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                umkm
                            </a>
                            <a href="{{ route('pengaduan-masyarakat') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                pengaduan
                            </a>
                            <a href="{{ route('kontak') }}"
                                class="text-xl tracking-wide text-center capitalize transition md:text-2xl hover:text-green-600 text-black">
                                kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
