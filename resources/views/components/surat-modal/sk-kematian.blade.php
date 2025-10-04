<div class="relative w-full p-6 bg-white rounded-lg place-self-center md:max-w-md lg:max-w-4xl md:p-10">
    <div class="space-y-8">
        <h5 class="text-3xl font-semibold capitalize">
            surat keterangan kematian
        </h5>
        <form wire:submit.prevent="submit" class="space-y-10">
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data diri
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="name" class="font-medium">
                            Nama lengkap
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('name') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="name" wire:model="name">
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="place-of-birth" class="font-medium">
                            Tempat lahir
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('placeOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="place-of-birth" wire:model="placeOfBirth">
                            @error('placeOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="day-of-birth" class="font-medium">
                            Tanggal lahir
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('dayOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="day-of-birth" wire:model="dayOfBirth">
                                        <option value=""></option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('monthOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="month-of-birth" wire:model="monthOfBirth">
                                        <option value=""></option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('yearOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="year-of-birth" wire:model="yearOfBirth">
                                        <option value=""></option>
                                        @for ($i = 1900; $i <= 2025; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            @error('dayOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            @error('monthOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            @error('yearOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="religion" class="font-medium">
                            Agama
                        </label>
                        <div>
                            <select
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('religion') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="religion" wire:model="religion">
                                <option value=""></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            @error('religion')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="profession" class="font-medium">
                            Profesi
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('profession') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="profession" wire:model="profession">
                            @error('profession')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="address" class="font-medium">
                            Alamat lengkap
                        </label>
                        <div>
                            <textarea
                                class="w-full px-3 py-2 min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('address') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="address" wire:model="address"></textarea>
                            @error('address')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data keterangan kematian
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="place-of-death" class="font-medium">
                            Tempat kematian
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('placeOfDeath') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="place-of-death" wire:model="placeOfDeath">
                            @error('placeOfDeath')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="day-of-death" class="font-medium">
                            Tanggal kematian
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('dayOfDeath') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="day-of-death" wire:model="dayOfDeath">
                                        <option value=""></option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('monthOfDeath') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="month-of-death" wire:model="monthOfDeath">
                                        <option value=""></option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('yearOfDeath') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="year-of-death" wire:model="yearOfDeath">
                                        <option value=""></option>
                                        @for ($i = 1900; $i <= 2025; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            @error('dayOfDeath')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            @error('monthOfDeath')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            @error('yearOfDeath')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="cause-of-death" class="font-medium">
                            Penyebab kematian
                        </label>
                        <div>
                            <textarea
                                class="w-full px-3 py-2 min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('causeOfDeath') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="cause-of-death" wire:model="causeOfDeath"></textarea>
                            @error('causeOfDeath')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="space-y-2">
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60"
                        wire:target="submit" wire.loading.attr.disabled="">
                        <span class="font-medium tracking-wide">
                            Buat surat keterangan
                        </span>
                        <svg wire:loading="" wire:target="submit" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 animate-spin" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="6" x2="12" y2="3"></line>
                            <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                            <line x1="18" y1="12" x2="21" y2="12"></line>
                            <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                            <line x1="12" y1="18" x2="12" y2="21"></line>
                            <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                            <line x1="6" y1="12" x2="3" y2="12"></line>
                            <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
                        </svg>
                    </button>
                    <div class="block md:hidden">
                        <a href="#" wire:click.prevent="close()"
                            class="block w-full px-4 py-2 space-x-2 text-center text-white transition border rounded-md bg-slate-600 border-slate-600 hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75">
                            <span class="font-medium tracking-wide">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
