<div class="relative w-full p-6 rounded-lg place-self-center md:max-w-md lg:max-w-4xl md:p-10">
    <div class="space-y-8">
        <h5 class="text-3xl font-semibold capitalize">
            surat keterangan kelahiran
        </h5>
        <form wire:submit.prevent="submit" class="space-y-10">
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data bayi
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="baby-name" class="font-medium">
                            Nama bayi
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('babyName') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="baby-name" wire:model="babyName">
                            @error('babyName')
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
                            Tanggal kelahiran
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
                        <label for="day-of-birth" class="font-medium">
                            Waktu kelahiran
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('hourOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="hour-of-birth" wire:model="hourOfBirth">
                                        <option value=""></option>
                                        @for ($i = 0; $i <= 23; $i++)
                                            <option value="{{ $i }}">{{ sprintf('%02d', $i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <select
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('minuteOfBirth') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="minute-of-birth" wire:model="minuteOfBirth">
                                        <option value=""></option>
                                        @for ($i = 0; $i <= 59; $i++)
                                            <option value="{{ $i }}">{{ sprintf('%02d', $i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <span class="px-4 py-2 text-black border rounded-md border-slate-700">
                                        WIB
                                    </span>
                                </div>
                            </div>
                            @error('hourOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            @error('minuteOfBirth')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="gender" class="font-medium">
                            Jenis kelamin bayi
                        </label>
                        <div>
                            <select
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('gender') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="gender" wire:model="gender">
                                <option value=""></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data ibu
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="mother-name" class="font-medium">
                            Nama
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('motherName') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="mother-name" wire:model="motherName">
                            @error('motherName')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="mother-id-card-number" class="font-medium">
                            NIK (boleh kosong)
                        </label>
                        <div>
                            <input type="number"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('motherIdCardNumber') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="mother-id-card-number" wire:model="motherIdCardNumber">
                            @error('motherIdCardNumber')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="mother-age" class="font-medium">
                            Umur
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-1">
                                    <input type="text"
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('motherAge') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="mother-age" wire:model="motherAge">
                                </div>
                                <span class="flex-shrink-0 px-4 py-2 text-black border rounded-md border-slate-700">
                                    tahun
                                </span>
                            </div>
                            @error('motherAge')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="mother-profession" class="font-medium">
                            Pekerjaan
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('motherProfession') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="mother-profession" wire:model="motherProfession">
                            @error('motherProfession')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="mother-address" class="font-medium">
                            Alamat
                        </label>
                        <div>
                            <textarea
                                class="w-full px-3 py-2 min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('motherAddress') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="mother-address" wire:model="motherAddress"></textarea>
                            @error('motherAddress')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data ayah
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="father-name" class="font-medium">
                            Nama
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('fatherName') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="father-name" wire:model="fatherName">
                            @error('fatherName')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="father-id-card-number" class="font-medium">
                            NIK (boleh kosong)
                        </label>
                        <div>
                            <input type="number"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('fatherIdCardNumber') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="father-id-card-number" wire:model="fatherIdCardNumber">
                            @error('fatherIdCardNumber')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="father-age" class="font-medium">
                            Umur
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-1">
                                    <input type="text"
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('fatherAge') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="father-age" wire:model="fatherAge">
                                </div>
                                <span class="flex-shrink-0 px-4 py-2 text-black border rounded-md border-slate-700">
                                    tahun
                                </span>
                            </div>
                            @error('fatherAge')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="father-profession" class="font-medium">
                            Pekerjaan
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('fatherProfession') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="father-profession" wire:model="fatherProfession">
                            @error('fatherProfession')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="father-address" class="font-medium">
                            Alamat
                        </label>
                        <div>
                            <textarea
                                class="w-full px-3 py-2 min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('fatherAddress') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="father-address" wire:model="fatherAddress"></textarea>
                            @error('fatherAddress')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data pelapor
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="reporter-name" class="font-medium">
                            Nama
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('reporterName') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="reporter-name" wire:model="reporterName">
                            @error('reporterName')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="reporter-id-card-number" class="font-medium">
                            NIK (boleh kosong)
                        </label>
                        <div>
                            <input type="number"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('reporterIdCardNumber') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="reporter-id-card-number" wire:model="reporterIdCardNumber">
                            @error('reporterIdCardNumber')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="reporter-age" class="font-medium">
                            Umur
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-1">
                                    <input type="text"
                                        class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('reporterAge') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                        id="reporter-age" wire:model="reporterAge">
                                </div>
                                <span class="flex-shrink-0 px-4 py-2 text-black border rounded-md border-slate-700">
                                    tahun
                                </span>
                            </div>
                            @error('reporterAge')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="reporter-profession" class="font-medium">
                            Pekerjaan
                        </label>
                        <div>
                            <input type="text"
                                class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('reporterProfession') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="reporter-profession" wire:model="reporterProfession">
                            @error('reporterProfession')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="reporter-address" class="font-medium">
                            Alamat
                        </label>
                        <div>
                            <textarea
                                class="w-full px-3 py-2 min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 @error('reporterAddress') border-red-500 @else border-slate-700 @enderror focus:border-black"
                                id="reporter-address" wire:model="reporterAddress"></textarea>
                            @error('reporterAddress')
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
