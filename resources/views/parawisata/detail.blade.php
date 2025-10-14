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
                <div class="relative z-[1] py-20 pt-32 mx-auto space-y-8 md:max-w-xl lg:max-w-4xl lg:pt-44">
                    <h1 class="text-6xl font-bold text-center capitalize md:text-8xl title" data-sr-id="0"
                        style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1), transform 1s cubic-bezier(0.5, 0, 0, 1);">
                        {{ $data->title }}

                    </h1>
                    <p class="text-xl font-light leading-relaxed text-center location" data-sr-id="4"
                        style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.4s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.4s;">
                        {{ $data->alamat }}
                    </p>
                </div>
            </section>
            <section id="description" class="relative" data-sr-id="5"
                style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.8s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.8s;">
                <div class="max-w-screen-xl pb-20 mx-auto space-y-20 lg:pt-10">
                    <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-14">
                        <img src="{{ Storage::url($data->gambar) }}" alt="Puncak Kobe"
                            class="object-cover w-full h-full rounded-2xl">
                        <div class="space-y-10 place-self-center">
                            <div wire:ignore="" id="map" class="w-full h-64 rounded-xl mapboxgl-map">
                                <div class="mapboxgl-canary" style="visibility: hidden;"></div>
                                <div
                                    class="mapboxgl-canvas-container mapboxgl-interactive mapboxgl-touch-drag-pan mapboxgl-touch-zoom-rotate">
                                    <canvas class="mapboxgl-canvas" tabindex="0" aria-label="Map" role="region"
                                        width="890" height="256" style="width: 890px; height: 256px;"></canvas>
                                    <div aria-label="Map marker" class="mapboxgl-marker mapboxgl-marker-anchor-center"
                                        role="button" tabindex="0" aria-expanded="false"
                                        style="transform: translate(445px, 128px) translate(-50%, -50%) translate(0px, 0px);">
                                        <img src="{{ $data->gambar }}" alt="kantor-desa-koto-mesjid"
                                            class="object-cover border-2 border-white rounded-full w-14 h-14">
                                    </div>
                                </div>
                                <div class="mapboxgl-control-container">
                                    <div class="mapboxgl-ctrl-top-left"></div>
                                    <div class="mapboxgl-ctrl-top-right">
                                        <div class="mapboxgl-ctrl mapboxgl-ctrl-group"><button class="mapboxgl-ctrl-zoom-in"
                                                type="button" aria-label="Zoom in" aria-disabled="false"><span
                                                    class="mapboxgl-ctrl-icon" aria-hidden="true"
                                                    title="Zoom in"></span></button><button class="mapboxgl-ctrl-zoom-out"
                                                type="button" aria-label="Zoom out" aria-disabled="false"><span
                                                    class="mapboxgl-ctrl-icon" aria-hidden="true"
                                                    title="Zoom out"></span></button><button class="mapboxgl-ctrl-compass"
                                                type="button" aria-label="Reset bearing to north"><span
                                                    class="mapboxgl-ctrl-icon" aria-hidden="true"
                                                    title="Reset bearing to north"
                                                    style="transform: rotate(0deg);"></span></button></div>
                                    </div>
                                    <div class="mapboxgl-ctrl-bottom-left">
                                        <div class="mapboxgl-ctrl" style="display: block;"><a class="mapboxgl-ctrl-logo"
                                                target="_blank" rel="noopener nofollow" href="https://www.mapbox.com/"
                                                aria-label="Mapbox logo"></a></div>
                                    </div>
                                    <div class="mapboxgl-ctrl-bottom-right">
                                        <div class="mapboxgl-ctrl mapboxgl-ctrl-attrib"><button
                                                class="mapboxgl-ctrl-attrib-button" type="button"
                                                aria-label="Toggle attribution"><span class="mapboxgl-ctrl-icon"
                                                    aria-hidden="true" title="Toggle attribution"></span></button>
                                            <div class="mapboxgl-ctrl-attrib-inner" role="list"><a
                                                    href="https://www.mapbox.com/about/maps" target="_blank" title="Mapbox"
                                                    aria-label="Mapbox">© Mapbox</a> <a
                                                    href="https://www.openstreetmap.org/copyright/" target="_blank"
                                                    title="OpenStreetMap" aria-label="OpenStreetMap">© OpenStreetMap</a> <a
                                                    class="mapbox-improve-map"
                                                    href="https://apps.mapbox.com/feedback/?owner=mapbox&amp;id=satellite-streets-v11&amp;access_token=pk.eyJ1IjoieW9hbm5vZmlzdXJ5YW5vIiwiYSI6ImNqdDNjenowMjB5OXY0OW9oeGg5NmRtNXgifQ.JO_TRyXVfzcZHf_y5dOGgQ"
                                                    target="_blank" aria-label="Map feedback"
                                                    rel="noopener nofollow">Improve this map</a> <a
                                                    href="https://www.maxar.com/" target="_blank" title="Maxar"
                                                    aria-label="Maxar">© Maxar</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mapboxgl-popup mapboxgl-popup-anchor-bottom"
                                    style="max-width: 240px; transform: translate(-50%, -100%) translate(445px, 103px);">
                                    <div class="mapboxgl-popup-tip"></div>
                                    <div class="mapboxgl-popup-content">
                                        <p class="leading-tight">{{ $data->title }}, {{ $data->alamat }}</p>
                                        <p>Lihat pada <a href="{{ $data->location }}" target="_blank"
                                                class="text-green-600 underline">google map</a></p><button
                                            class="mapboxgl-popup-close-button" type="button" aria-label="Close popup"
                                            aria-hidden="true">×</button>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <h6 class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left title"
                                    data-sr-id="2"
                                    style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 1s cubic-bezier(0.5, 0, 0, 1), transform 1s cubic-bezier(0.5, 0, 0, 1);">
                                    deskripsi
                                </h6>
                                <div
                                    class="text-lg font-light leading-relaxed text-center md:text-xl lg:text-left lg:leading-relaxed">
                                    {!! $data->deskripsi !!}
                                </div>
                            </div>
                            <div class="space-y-6">
                                <h6 class="text-lg font-semibold tracking-widest text-center text-green-600 uppercase lg:text-left title"
                                    data-sr-id="3">
                                    galeri
                                </h6>
                                <div class="grid grid-cols-2 gap-5 md:grid-cols-2">
                                    @foreach ($data->galeri as $item)
                                        <img src="{{ Storage::url($item) }}" alt="1656142697006.jpg"
                                            class="w-full h-64 rounded-xl sequenced" data-sr-id="7">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- Include Footer Component --}}
        @include('layouts.footer')

        <script>
            const lat = {{ $data->lat }};
            const long = {{ $data->long }};

            mapboxgl.accessToken =
                'pk.eyJ1IjoieW9hbm5vZmlzdXJ5YW5vIiwiYSI6ImNqdDNjenowMjB5OXY0OW9oeGg5NmRtNXgifQ.JO_TRyXVfzcZHf_y5dOGgQ';
            var map = new mapboxgl.Map({
                container: 'map',
                center: [lat, long],
                zoom: 15,
                style: 'mapbox://styles/mapbox/satellite-streets-v11'
            });

            map.addControl(new mapboxgl.NavigationControl())

            const el = document.createElement('div');
            el.innerHTML = `<img
                        src="{{ $data->gambar }}"
                        alt="kantor-desa-koto-mesjid"
                        class="object-cover border-2 border-white rounded-full w-14 h-14"
                    >`;

            const popup = new mapboxgl.Popup({
                    closeOnClick: false,
                    offset: 25
                })
                .setLngLat([lat, long])
                .setHTML(
                    `<p class="leading-tight">{{ $data->title }}, {{ $data->alamat }}</p>
                                    <p>Lihat pada <a href="http://maps.google.com/maps?z=12&t=m&q=loc:long+lat" target="_blank" class="text-green-600 underline">google map</a></p>`
                );

            new mapboxgl.Marker(el)
                .setLngLat([lat, long])
                .setPopup(popup)
                .addTo(map);

            popup.addTo(map);

            ScrollReveal().reveal('.title', {
                duration: 1000,
                origin: 'top',
                distance: '100px',
            });

            ScrollReveal().reveal('.location', {
                delay: 400,
                duration: 1000,
                origin: 'top',
                distance: '100px',
            });

            ScrollReveal().reveal('#description', {
                delay: 800,
                duration: 1000,
                origin: 'top',
                distance: '100px',
            });

            ScrollReveal().reveal('.sequenced', {
                delay: 600,
                interval: 300,
                origin: 'top',
                distance: '50px',
            });
        </script>
    </div>
@endsection
