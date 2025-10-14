@extends('layouts.app')

@section('content')
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
                <div class="relative z-[1] py-20 pt-32 pb-10 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                    <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title" data-sr-id="0"
                        style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1), transform 1s cubic-bezier(0.5, 0, 0, 1);">
                        status {{ $jenisSurat }}
                    </h1>
                </div>
            </section>
            <section id="content" class="relative" data-sr-id="2"
                style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.6s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.6s;">
                <div class="max-w-xl py-20 pt-0 mx-auto lg:pt-10">
                    <h5 class="mb-10 text-2xl font-medium leading-snug text-center">
                        {{ $jenisSurat }} dengan kode surat unik {{ $certificate->code }}
                    </h5>
                    <ul class="space-y-7">
                        @if ($certificate->confirmation_status === $status::PENDING)
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-green-600">
                                        Pengajuan surat keterangan
                                    </h6>
                                    <p class="text-lg font-light">
                                        Diajukan pada sabtu, 4 oktober 2025 pukul 17.38 wib
                                    </p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-slate-500" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-slate-500">
                                        Petugas melakukan verifikasi data
                                    </h6>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-slate-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-slate-500">
                                    Hasil verifikasi data dikonfirmasi oleh petugas
                                </h6>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-slate-500" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-slate-500">
                                    Proses selesai dan surat keterangan dapat diunduh
                                </h6>
                            </li>
                        @elseif ($certificate->confirmation_status === $status::CONFIRM)
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-green-600">
                                        Pengajuan surat pengaduan
                                    </h6>
                                    <p class="text-lg font-light">
                                        Diajukan pada sabtu, 4 oktober 2025 pukul 17.38 wib
                                    </p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-green-600">
                                        Petugas melakukan verifikasi data
                                    </h6>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-slate-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-slate-500">
                                    Hasil verifikasi data dikonfirmasi oleh petugas
                                </h6>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-slate-500" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-slate-500">
                                    Proses selesai dan surat pengaduan dapat diunduh
                                </h6>
                            </li>
                        @elseif ($certificate->confirmation_status === $status::SUCCESS)
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-green-600">
                                        Pengajuan surat keterangan
                                    </h6>
                                    <p class="text-lg font-light">
                                        Diajukan pada sabtu, 4 oktober 2025 pukul 17.38 wib
                                    </p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <div class="space-y-2">
                                    <h6 class="text-xl font-medium text-green-600">
                                        Petugas melakukan verifikasi data
                                    </h6>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-green-600">
                                    Hasil verifikasi data dikonfirmasi oleh petugas
                                </h6>
                            </li>
                            <li class="flex items-start space-x-3 md:space-x-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 -mt-[6px] flex-shrink-0 text-green-600" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                <h6 class="text-xl font-medium text-green-600">
                                    Proses selesai dan surat keterangan dapat diunduh <br> <a class=" underline"
                                        href="{{ route('surat-online.lihat', ['code' => $certificate->code, 'jenis' => $jenis]) }}">di
                                        sini</a>.
                                </h6>
                            </li>
                        @endif

                    </ul>
                </div>
            </section>
        </div>
        {{-- Include Footer Component --}}
        @include('layouts.footer')
    </div>
@endsection
