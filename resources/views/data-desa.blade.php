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
                        <h1 class="text-6xl font-bold text-center capitalize break-words md:text-8xl title">
                            data desa
                        </h1>
                        <p class="text-xl font-light leading-relaxed text-center description">
                            Kami memiliki sistem yang memungkinkan untuk melakukan pendataan secara cepat,
                            akurat dan terpercaya. Berikut kami sajikan statistik data dari kelurahan tuwung
                        </p>
                    </div>
                </div>
            </section>
            <section id="content" class="relative">
                <div class="px-6 md:px-10 lg:px-20">
                    <div class="max-w-6xl py-20 pt-10 mx-auto space-y-36 lg:space-y-44 lg:pt-20">
                        <div class="space-y-8 md:space-y-20">
                            <div class="w-full space-y-8 lg:max-w-2xl content">
                                <h6
                                    class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left">
                                    kependudukan
                                </h6>
                                <p class="text-xl font-light leading-relaxed text-center lg:text-left">
                                    Statistik penduduk yang berada di kelurahan tuwung berjumlah <span
                                        class="text-green-600">693 kk</span> dan <span class="text-green-600">2.467 jiwa
                                    </span>
                                    dengan rincian 1.239 jiwa
                                    berjenis kelamin laki-laki serta 1.228 jiwa berjenis kelamin perempuan
                                </p>
                            </div>
                            <div class="space-y-10 md:space-y-32 lg:space-y-44">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="population-by-age" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    penduduk berdasarkan usia
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="population-by-marriage" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    penduduk berdasarkan status perkawinan
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="population-by-education" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    penduduk berdasarkan pendidikan terakhir
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="population-by-occupation" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    penduduk berdasarkan jenis pekerjaan
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-10 md:space-y-14 lg:space-y-20">
                            <div class="w-full space-y-8 lg:max-w-2xl content">
                                <h6
                                    class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left">
                                    lahan wilayah
                                </h6>
                                <p class="text-xl font-light leading-relaxed text-center lg:text-left">
                                    Kelurahan tuwung memiliki luas lahan sejumlah <span class="text-green-600">425,5
                                        ha</span>
                                    yang dimana luas sebesar 120
                                    digunakan sebagai lokasi pemukiman dan luas sebesar 305,5 ha digunakan
                                    sebagai lokasi non pemukiman
                                </p>
                            </div>
                            <div class="space-y-10 md:space-y-32 lg:space-y-44">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="use-area" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    statistik penggunanaan lahan
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-10 md:space-y-14 lg:space-y-20">
                            <div class="w-full space-y-8 lg:max-w-2xl content">
                                <h6
                                    class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left">
                                    sarana dan parasarana
                                </h6>
                                <p class="text-xl font-light leading-relaxed text-center lg:text-left">
                                    Jumlah keseluruhan sarana dan prasarana yang ada pada kelurahan tuwung
                                    berjumlah <span class="text-green-600">0 unit</span> dengan rincian 0 unit
                                    berkondisikan baik, 0 unit berkondisikan rusak sedang dan 0 unit
                                    berkondisikan rusak parah
                                </p>
                            </div>
                            <div class="space-y-10 md:space-y-32 lg:space-y-44">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="infrastructure-owner" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    sarana dan prasaran berdasarkan kepemilikan
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="infrastructure-type" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    jenis sarana dan prasarana
                                                </h1>
                                                <h6
                                                    class="text-lg font-bold leading-tight text-center text-black capitalize lg:text-xl lg:text-left">
                                                    data tahun 2024
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
