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
                        produk umkm
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        Temukan berbagai produk kreatif dari badan usaha unit mikro kecil menengah (UMKM) kelurahan
                        tuwung di sini
                    </p>
                </div>
            </section>
            <section id="content" class="relative">
                <div class="max-w-6xl py-20 pt-0 mx-auto lg:pt-20">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-3 md:gap-10 lg:grid-cols-4 lg:gap-12">
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/gantungan-kunci-strowbery-rajut.jpeg"
                                        alt="gantungan-kunci-strowbery-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 8.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Gantungan Kunci Strowbery Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/pudung-ikan-ikan-asin-patin.jpeg"
                                        alt="pudung-ikan-ikan-asin-patin" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kuliner
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 18.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Pudung Ikan (Ikan Asin Patin)
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/dekla-kelapa-jelly.jpeg"
                                        alt="dekla-kelapa-jelly" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kuliner
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 20.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Dekla (Kelapa Jelly)
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/sepatu-rajut-semi-boots.jpeg"
                                        alt="sepatu-rajut-semi-boots" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 350.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Sepatu Rajut Semi Boots
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/sendal-jepit-motif-rajut.jpeg"
                                        alt="sendal-jepit-motif-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 40.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Sendal Jepit Motif Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/tas-rajut-daun-3d.jpeg"
                                        alt="tas-rajut-daun-3d" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 600.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Tas Rajut Daun 3D
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/tas-rajut-vikra.jpeg"
                                        alt="tas-rajut-vikra" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 350.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Tas Rajut Vikra
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/tas-tangan-rajut.jpeg"
                                        alt="tas-tangan-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 250.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Tas Tangan Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/sling-bag-rajut.jpeg"
                                        alt="sling-bag-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 200.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Sling Bag Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/tas-hp-rajut.jpeg"
                                        alt="tas-hp-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 70.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Tas Hp Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/dompet-rajut.jpeg"
                                        alt="dompet-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 70.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Dompet Rajut
                                </h4>
                            </div>
                        </a>
                        <a href="#" onclick="Livewire.dispatch('openModal', { component: 'guest.product.show' })">
                            <div class="space-y-3">
                                <div class="relative w-full overflow-hidden h-52 rounded-xl">
                                    <img src="https://kotomesjid.com/storage/image/product/masker-rajut.jpeg"
                                        alt="masker-rajut" class="relative object-cover w-full h-full">
                                    <span
                                        class="absolute px-2 py-1 text-xs font-bold text-white capitalize rounded-md bg-slate-700/50 bottom-3 right-3">
                                        Kriya
                                    </span>
                                </div>
                                <h6 class="text-xl font-semibold text-right">
                                    Rp 25.000
                                </h6>
                                <h4 class="text-xl font-light leading-snug">
                                    Masker Rajut
                                </h4>
                            </div>
                        </a>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
                            </div>
                        </div>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
                            </div>
                        </div>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
                            </div>
                        </div>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
                            </div>
                        </div>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
                            </div>
                        </div>
                        <div wire:loading.block>
                            <div class="w-full rounded-xl animate-pulse">
                                <div class="rounded-xl bg-slate-300 h-44"></div>
                                <div class="relative h-5 mt-4">
                                    <div class="absolute top-0 right-0 h-full rounded-lg w-28 bg-slate-300">
                                    </div>
                                </div>
                                <div class="w-full h-5 mt-4 rounded-lg bg-slate-300"></div>
                                <div class="w-10/12 h-5 mt-2 rounded-lg bg-slate-300"></div>
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
