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
                                        class="text-green-600">{{ $jumlahKK }} kk</span> dan <span
                                        class="text-green-600">{{ $jumlahPenduduk }} jiwa
                                    </span>
                                    dengan rincian {{ $byGender[0]->total ?? 0 }} jiwa
                                    berjenis kelamin laki-laki serta {{ $byGender[1]->total ?? 0 }} jiwa berjenis kelamin
                                    perempuan
                                </p>
                            </div>
                            <div class="space-y-10 md:space-y-32 lg:space-y-44">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:gap-10 lg:gap-20">
                                    <div class="flex justify-center order-2 col-span-1 lg:col-span-2 lg:order-1">
                                        <canvas id="chartByAge" class="second"></canvas>
                                    </div>
                                    <div class="grid order-1 place-content-center lg:order-2">
                                        <div class="space-y-10 first">
                                            <div class="mt-5 space-y-2 md:mt-0">
                                                <h1
                                                    class="text-3xl font-light leading-tight text-center text-black capitalize lg:text-4xl lg:text-left">
                                                    penduduk berdasarkan Usia
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
                                    Kelurahan tuwung memiliki luas lahan sejumlah <span
                                        class="text-green-600">{{ $lahanWilayah->sum('luas_lahan') ?? '0' }}
                                        ha</span>
                                    yang dimana luas sebesar
                                    {{ $lahanWilayah->where('jenis_lahan', 'Pemukiman')->sum('luas_lahan') ?? '0' }}
                                    digunakan sebagai lokasi pemukiman dan luas sebesar
                                    {{ $lahanWilayah->where('jenis_lahan', '!=', 'Pemukiman')->sum('luas_lahan') ?? '0' }}
                                    ha
                                    digunakan
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
                                    berjumlah <span class="text-green-600">{{ $saranaPrasarana->count() }} unit</span>
                                    dengan rincian {{ $saranaPrasarana->where('kondisi_sarana', 'Baik')->count() }} unit
                                    berkondisikan baik,
                                    {{ $saranaPrasarana->where('kondisi_sarana', 'Rusak Sedang')->count() }} unit
                                    berkondisikan rusak sedang dan
                                    {{ $saranaPrasarana->where('kondisi_sarana', 'Rusak Parah')->count() }} unit
                                    berkondisikan rusak parah
                                </p>
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
            </section>
        </div>
        <section id="public-complaint" class="relative">
            <div class="relative px-6 overflow-hidden bg-green-600 md:px-10">
                <div class="max-w-6xl py-20 mx-auto relative z-[1]">
                    <div class="w-full mx-auto lg:w-2/3">
                        <h1 class="text-4xl font-light leading-tight text-center text-white title">
                            Belum terdaftar sebagai Penduduk? Input Data Anda Sekarang
                        </h1>
                        <div class="flex justify-center mt-12 description">
                            <a href="#"
                                onclick="Livewire.dispatch('openModal', { component: 'guest.penduduk.input' })"
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

        <script>
            // === Data dari Controller ===
            const genderLabels = @json($byGender->pluck('jenis_kelamin'));
            const genderData = @json($byGender->pluck('total'));

            const pekerjaanLabels = @json($byPekerjaan->pluck('pekerjaan'));
            const pekerjaanData = @json($byPekerjaan->pluck('total'));

            const pendidikanLabels = @json($byPendidikan->pluck('pendidikan'));
            const pendidikanData = @json($byPendidikan->pluck('total'));

            const kemiskinanLabels = @json($byKemiskinan->pluck('kategori_kemiskinan'));
            const kemiskinanData = @json($byKemiskinan->pluck('total'));



            const ctx5 = document.getElementById('use-area');
            const useArea = new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: {!! $lahanWilayah->pluck('nama_lahan') !!},
                    datasets: [{
                        data: {!! $lahanWilayah->pluck('luas_lahan') !!},
                        labelFormated: {!! $lahanWilayah->pluck('nama_lahan') !!},
                        backgroundColor: 'rgb(48, 163, 73, .8)',
                        valueFormated: {!! $lahanWilayah->pluck('luas_lahan') !!},
                        percentage: {!! $lahanWilayah->pluck('luas_lahan')->map(fn($item) => "{$item} Ha") !!},
                        backgroundColor: [
                            '#d5fadd',
                            '#4fb672',
                            '#2AA874',
                            '#009975',
                            '#008B75',
                            '#007C73',
                            '#006D6E',
                        ],
                    }],
                },
                options: {
                    indexAxis: 'y',
                    animation: {
                        delay: 1000
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true
                            },
                        },
                        x: {
                            grid: {
                                borderWidth: 2,
                                borderColor: 'rgb(48, 163, 73, .8)',
                                color: 'rgb(118, 124, 119, .2)'
                            }
                        }
                    },
                    layout: {
                        padding: {
                            top: 40,
                            bottom: 10,
                            right: 10,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'end',
                            anchor: 'end',
                            color: 'black',
                            textAlign: 'center',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                    }
                }
            });

            const ctx7 = document.getElementById('infrastructure-type');
            const infrastructureType = new Chart(ctx7, {
                type: 'bar',
                data: {
                    labels: {!! $saranaPrasarana->pluck('jenis_sarana') !!},
                    datasets: [{
                        data: {!! $saranaPrasarana->pluck('kapasitas_sarana') !!},
                        backgroundColor: 'rgb(48, 163, 73, .8)',
                        labelFormated: {!! $saranaPrasarana->pluck('jenis_sarana') !!},
                        valueFormated: {!! $saranaPrasarana->pluck('kapasitas_sarana')->map(fn($val) => $val . ' unit') !!},
                        percentase: {!! $saranaPrasarana->pluck('kapasitas_sarana')->map(fn($val) => $val . ' unit') !!},
                        backgroundColor: [
                            '#d5fadd',
                            '#4fb672',
                            '#2AA874',
                            '#009975',
                            '#008B75',
                            '#007C73',
                            '#006D6E',
                        ],
                    }],
                },
                options: {
                    indexAxis: 'y',
                    animation: {
                        delay: 1000
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true
                            },
                        },
                        x: {
                            grid: {
                                borderWidth: 2,
                                borderColor: 'rgb(48, 163, 73, .8)',
                                color: 'rgb(118, 124, 119, .2)'
                            }
                        }
                    },
                    layout: {
                        padding: {
                            top: 40,
                            bottom: 10,
                            right: 10,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'end',
                            anchor: 'end',
                            color: 'black',
                            textAlign: 'center',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                    }
                }
            });

            const ctx1 = document.getElementById('chartByAge');
            const populationByAge = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: {!! $byUsia->pluck('usia')->map(fn($val) => 'Usia ' . $val) !!},
                    datasets: [{
                        data: {!! $byUsia->pluck('total') !!},
                        backgroundColor: 'rgb(48, 163, 73, .8)',
                        valueFormated: {!! $byUsia->pluck('total')->map(fn($val) => $val . ' jiwa') !!},
                        percentase: {!! $byUsia->pluck('total')->map(fn($val) => $val . ' jiwa') !!},
                    }]
                },
                options: {
                    animation: {
                        delay: 1000
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: false
                            },
                        },
                        x: {
                            grid: {
                                borderWidth: 2,
                                borderColor: 'rgb(48, 163, 73, .8)',
                                color: 'rgb(118, 124, 119, .2)'
                            }
                        }
                    },
                    layout: {
                        padding: {
                            top: 40,
                            bottom: 10,
                            right: 10,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'end',
                            anchor: 'end',
                            color: 'black',
                            textAlign: 'center',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                    }
                }
            });

            const ctx3 = document.getElementById('population-by-education');
            const populationByEducation = new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    labels: {!! $byPendidikan->pluck('label') !!},
                    datasets: [{
                        data: {!! $byPendidikan->pluck('total') !!},
                        backgroundColor: 'rgb(48, 163, 73, .8)',
                        labelFormated: {!! $byPendidikan->pluck('label') !!},
                        valueFormated: {!! $byPendidikan->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        percentase: {!! $byPendidikan->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        backgroundColor: [
                            '#d5fadd',
                            '#4fb672',
                            '#2AA874',
                            '#009975',
                            '#008B75',
                            '#007C73',
                            '#006D6E',
                        ],
                    }],
                },
                options: {
                    animation: {
                        delay: 1000
                    },
                    scales: {
                        x: {
                            ticks: {
                                display: false
                            },
                        },
                        y: {
                            ticks: {
                                display: false
                            },
                        },
                    },
                    layout: {
                        padding: {
                            top: 40,
                            bottom: 10,
                            right: 10,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return tooltipItem[0].dataset.labelFormated[tooltipItem[0].dataIndex];
                                },
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'right',
                            anchor: 'center',
                            color: 'black',
                            textAlign: 'center',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                    }
                },
                plugins: [ChartDataLabels],
            });


            const ctx2 = document.getElementById('population-by-marriage');
            const populationByMarriage = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: {!! $byStatusKawin->pluck('label') !!},
                    datasets: [{
                        data: {{ $byStatusKawin->pluck('total') }},
                        backgroundColor: 'rgb(48, 163, 73, .8)',
                        labelFormated: {!! $byStatusKawin->pluck('label') !!},
                        valueFormated: {!! $byStatusKawin->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        percentase: {!! $byStatusKawin->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        backgroundColor: [
                            '#d5fadd',
                            '#4fb672',
                            '#2AA874',
                            '#009975',
                            '#008B75',
                            '#007C73',
                            '#006D6E',
                        ],
                    }],
                },
                options: {
                    indexAxis: 'y',
                    animation: {
                        delay: 1000
                    },
                    scales: {

                        y: {
                            ticks: {
                                display: true
                            },
                        },
                        x: {
                            ticks: {
                                display: true
                            },
                            grid: {
                                borderWidth: 2,
                                borderColor: 'rgb(48, 163, 73, .8)',
                                color: 'rgb(118, 124, 119, .2)'
                            }
                        }
                    },
                    layout: {
                        padding: {
                            top: 40,
                            bottom: 10,
                            right: 10,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'start',
                            anchor: 'end',
                            color: 'black',
                            textAlign: 'center',
                            padding: 6,
                            font: {
                                size: 12,
                                weight: 'bold',
                                // color: 'white',
                            }
                        },
                    }
                },
                plugins: [ChartDataLabels],
            });

            const ctx4 = document.getElementById('population-by-occupation');
            const populationByOccupation = new Chart(ctx4, {
                type: 'doughnut',
                data: {
                    labels: {!! $byPekerjaan->pluck('label') !!},
                    datasets: [{
                        data: {{ $byPekerjaan->pluck('total') }},
                        labelFormated: {!! $byPekerjaan->pluck('label') !!},
                        valueFormated: {!! $byPekerjaan->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        percentase: {!! $byPekerjaan->pluck('total')->map(fn($val) => $val . ' orang') !!},
                        backgroundColor: [
                            '#d5fadd',
                            '#4fb672',
                            '#2AA874',
                            '#009975',
                            '#008B75',
                            '#007C73',
                            '#006D6E',
                        ],
                    }],
                },
                options: {
                    animation: {
                        delay: 1000
                    },
                    scales: {
                        x: {
                            ticks: {
                                display: false
                            },
                        },
                        y: {
                            ticks: {
                                display: false
                            },
                        },
                    },
                    layout: {
                        padding: {
                            top: 10,
                            bottom: 10,
                            right: 40,
                            left: 10,
                        },
                    },
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            displayColors: false,
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return tooltipItem[0].dataset.labelFormated[tooltipItem[0].dataIndex];
                                },
                                label: function(tooltipItem, data) {
                                    return tooltipItem.dataset.valueFormated[tooltipItem.dataIndex];
                                },
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].percentase[context.dataIndex];
                            },
                            align: 'right',
                            anchor: 'center',
                            color: 'black',
                            textAlign: 'center',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                    }
                },
                plugins: [ChartDataLabels],
            });
        </script>

    </div>
@endsection
