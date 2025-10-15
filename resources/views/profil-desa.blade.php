@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-h-screen">
        {{-- Include Navbar Component --}}
        @include('layouts.navbar')
        <div class="flex-1 ">
            <section id="hero" class="relative">
                <div class="absolute inset-x-0 top-0 flex justify-center pt-32">
                    <div class="bg-[#33AC3E] rounded-full w-96 h-96 blur-[150px] opacity-50 -mr-10 -mt-20">
                    </div>
                    <div class="bg-[#6DC321] rounded-full w-96 h-96 blur-[150px] opacity-50 -ml-10 mt-20">
                    </div>
                </div>
                <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                    <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                        profil desa
                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center description">
                        {{ $profil->sub_judul }}
                    </p>
                </div>
            </section>
            <section class="relative content">
                <div class="grid max-w-6xl grid-cols-1 gap-10 py-20 pt-0 mx-auto lg:gap-20 lg:pt-20 lg:grid-cols-5">
                    <div class="col-span-1 lg:col-span-2">
                        <img src="https://kotomesjid.com/storage/image/hero/desa-koto-mesjid.jpg" alt="desa-koto-mesjid"
                            class="object-cover w-full h-96 lg:h-[600px] rounded-xl">
                    </div>
                    <div class="col-span-1 space-y-10 lg:col-span-3">
                        <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                            sejarah desa
                        </h6>
                        <div class="font-light leading-relaxed prose-xl ck-content ck-custom text-center lg:text-left">
                            {!! $profil->sejarah_desa !!}
                        </div>
                    </div>
                </div>
            </section>
            <section class="relative content">
                <div class="grid max-w-6xl grid-cols-1 gap-10 py-20 pt-0 mx-auto lg:gap-20 lg:pt-20 lg:grid-cols-5">
                    <div class="col-span-1 space-y-20 lg:col-span-3">
                        <div class="space-y-10">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                                visi
                            </h6>
                            <div class="font-light leading-relaxed prose-xl ck-content ck-custom text-center lg:text-left">
                                {!! $profil->visi !!}
                            </div>
                        </div>
                        <div class="space-y-10">
                            <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                                misi
                            </h6>
                            <div class="font-light leading-relaxed prose-xl ck-content ck-custom text-center lg:text-left">
                                {!! $profil->misi !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2">
                        <img src="https://kotomesjid.com/storage/image/hero/desa-wisata-kampung-patin.jpg"
                            alt="desa-koto-mesjid" class="object-cover w-full h-96 lg:h-[600px] rounded-xl">
                    </div>
                </div>
            </section>
            <section class="relative content">
                <div class="max-w-6xl py-20 pt-0 mx-auto space-y-10">
                    <h6 class="text-lg font-semibold tracking-widest text-left text-green-600 uppercase">
                        aparatur desa
                    </h6>
                    <div class="grid grid-cols-2 gap-5 gap-y-8 md:grid-cols-3 lg:grid-cols-4 md:gap-10">
                        @forelse ($aparaturDesa as $aparatur)
                            <div class="space-y-3 sequenced">
                                <img src="{{ asset('storage/' . $aparatur->foto) }}"
                                    class="object-cover w-full rounded-lg h-60 md:h-80 lg:h-96 md:rounded-xl"
                                    alt="{{ $aparatur->nama }}">
                                <div class="space-y-1 text-center md:space-y-2">
                                    <h6 class="text-base font-semibold md:text-xl">
                                        {{ $aparatur->nama }}
                                    </h6>
                                    <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                        {{ $aparatur->jabatan }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm font-light leading-snug md:text-lg md:leading-tight">
                                Belum ada data aparatur desa.
                            </p>
                        @endforelse


                    </div>
                </div>
            </section>
        </div>

        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
