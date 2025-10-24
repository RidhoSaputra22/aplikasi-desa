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
            <div class="relative z-[1] py-20 pb-10 pt-32 mx-auto space-y-8 md:max-w-xl md:pb-16 lg:max-w-4xl lg:pt-44">
                <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                    Berita
                </h1>
                <div class="space-y-5 description">
                    <p class="text-xl font-light leading-relaxed text-center">
                        Cari dan temukan berbagai berita terbaru mengenai kelurahan Tuwung disini
                    </p>
                    <div
                        class="flex items-center w-full lg:w-[500px] mx-auto px-3 overflow-hidden border rounded-md h-11 border-slate-600 focus-within:ring-4 focus-within:border-slate-800 focus-within:ring-black/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-slate-700"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="10" cy="10" r="7"></circle>
                            <line x1="21" y1="21" x2="15" y2="15"></line>
                        </svg>
                        <input type="text"
                            class="w-full text-lg font-light text-black bg-transparent border-0 focus:ring-0 placeholder-slate-700"
                            wire:model.live="search" autocomplete="off" placeholder="Cari berita" />
                    </div>
                </div>
        </section>
        <section id="content" class="relative">
            <div class="max-w-6xl py-20 pt-0 mx-auto lg:pt-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-20 md:gap-y-10 gap-y-8">
                    @forelse ($results as $data)
                        <a href="{{ route('publikasi.berita', $data->slug) }}"
                            class="flex space-x-5 space-y-0 lg:space-x-8 sequenced">
                            <div class="flex-shrink-0 w-24 h-16 md:h-24 md:w-36">
                                <img src="{{ $data->gambar }}" alt="{{ $data->judul }}"
                                    class="object-cover w-full h-full rounded-md md:rounded-lg lg:rounded-xl">
                            </div>
                            <div class="space-y-2">
                                <h3 class="-mt-1 text-xl leading-snug text-black line-clamp-3 md:mt-0"
                                    title="{{ $data->judul }}">
                                    {{ $data->judul }}
                                </h3>
                                <p class="font-light text-black">
                                    {{ $data->created_at->format('F j, Y') }}
                                </p>
                            </div>
                        </a>

                    @empty
                    @endforelse

                    <div class="grid col-span-1 mt-10 place-content-center lg:col-span-2">
                        <p class="text-xl font-light text-center text-slate-500">
                            Hasil akhir dari publikasi berita
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{-- Include Footer Component --}}
    @include('layouts.footer')
</div>
