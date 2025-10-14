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
                            pengaduan masyarakat
                        </h1>
                        <p class="text-xl font-light leading-relaxed text-center description">
                            Kini anda dapat memuat laporan pengaduan seputar permasalahan kelurahan tuwung, dan
                            pihak kelurahan akan menanggapi pengaduan serta anda dapat memantau apakah laporan sudah
                            ditindaklanjuti atau belum secara <span class="italic">real-time</span>
                        </p>
                    </div>
                </div>
            </section>
            <section id="info" class="relative">
                <div class="relative px-6 md:px-10">
                    <div
                        class="max-w-6xl py-32 pt-0 md:pt-20 mx-auto space-y-24 md:space-y-32 lg:space-y-40 relative z-[1]">
                        <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                            <img src="https://kotomesjid.com/storage/image/hero/public-complaint-step-1.png"
                                alt="tentukan surat online"
                                class="object-cover w-full border-4 border-black rounded-xl h-72 lg:h-80 title">
                            <div class="space-y-3 place-self-center description">
                                <h1 class="text-4xl font-bold leading-tight text-center text-black capitalize md:text-left">
                                    isi formulir pengaduan
                                </h1>
                                <p class="text-xl font-light leading-relaxed text-center md:text-left">
                                    Lengkapi formulir pengaduan terlebih dahulu dengan mengisikan data diri
                                    pelapor serta uraikan pengaduan dengan jelas, lengkap dan benar
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                            <img src="https://kotomesjid.com/storage/image/hero/public-complaint-step-2.png"
                                alt="tentukan surat online"
                                class="object-cover w-full border-4 border-black rounded-xl h-72 lg:h-80 title">
                            <div class="space-y-3 place-self-center description">
                                <h1 class="text-4xl font-bold leading-tight text-center text-black capitalize md:text-left">
                                    unduh bukti pelaporan pengaduan
                                </h1>
                                <p class="text-xl font-light leading-relaxed text-center md:text-left">
                                    Setelah mengisi formulir pengaduan, unduh bukti pelaporan untuk dan scan
                                    qrcode untuk memonitoring pengaduan yang telah dibuat
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-10 md:gap-20 lg:gap-40 lg:grid-cols-2">
                            <img src="https://kotomesjid.com/storage/image/hero/public-complaint-step-3.png"
                                alt="tentukan surat online"
                                class="object-cover w-full border-4 border-black rounded-xl h-72 lg:h-80 title">
                            <div class="space-y-3 place-self-center description">
                                <h1 class="text-4xl font-bold leading-tight text-center text-black capitalize md:text-left">
                                    lakukan monitoring pengaduan
                                </h1>
                                <p class="text-xl font-light leading-relaxed text-center md:text-left">
                                    Petugas desa akan mengkonfirmasi dan mengirimkan petugas untuk menyelesaian
                                    pengaduan anda, dan anda dapat melakukan memantau status perkembangan
                                    pengaduan secara <span class="italic">real time</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="public-complaint" class="relative">
                <div class="relative px-6 overflow-hidden bg-green-600 md:px-10">
                    <div class="max-w-6xl py-20 mx-auto relative z-[1]">
                        <div class="w-full mx-auto lg:w-2/3">
                            <h1 class="text-4xl font-light leading-tight text-center text-white title">
                                Ayo sampaikan pengaduan anda untuk kelurahan tuwung menjadi lebih baik lagi
                            </h1>
                            <div class="flex justify-center mt-12 description">
                                <a href="#"
                                    onclick="Livewire.dispatch('openModal', { component: 'guest.public-complain.create' })"
                                    class="px-6 py-3 text-lg text-green-600 bg-white rounded-lg hover:bg-white/95 focus:ring-4 focus:ring-white/20">
                                    Buat pengaduan sekarang
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
