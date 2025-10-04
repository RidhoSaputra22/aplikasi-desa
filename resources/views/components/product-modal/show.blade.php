<div class="flex flex-col w-full h-screen md:flex-row bg-black/50">
    <div x-init="" @click.self="$wire.closeModal()"
        class="relative flex justify-center flex-1 h-full overflow-hidden">

        <img src="https://kotomesjid.com/storage/image/product/sepatu-rajut-semi-boots.jpeg" alt="sepatu-rajut-semi-boots"
            class="object-contain h-full">
    </div>
    <div class="flex-shrink-0 w-full p-6 bg-white h-fit md:h-full lg:p-10 md:w-72 lg:w-96">
        <h5 class="text-2xl font-semibold leading-tight capitalize lg:text-4xl">
            Sepatu Rajut Semi Boots
        </h5>
        <ul class="mt-3 divide-y divide-black lg:mt-5">
            <li class="flex items-start justify-between py-3">
                <p class="text-base text-black capitalize lg:text-lg">
                    harga
                </p>
                <p class="text-base text-black lg:text-lg">
                    Rp 350.000
                </p>
            </li>
            <li class="flex items-start justify-between py-3">
                <p class="text-base text-black capitalize lg:text-lg">
                    kategori
                </p>
                <p class="text-base text-black lg:text-lg">
                    Kriya
                </p>
            </li>
        </ul>
        <div class="mt-5 lg:mt-10">
            <a href="https://api.whatsapp.com/send/?phone=6282173053862" target="_blank"
                class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60">
                <span class="font-medium tracking-wide">
                    Beli sekarang
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2.2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/shopping-cart</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
