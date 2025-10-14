  <div x-init="" @click.self="$wire.closeModal()"
      class="relative grid w-full h-screen p-6 overflow-y-auto md:p-10">
      <div class="relative w-full p-6 bg-white rounded-lg place-self-center md:max-w-md lg:max-w-4xl md:p-10">
          <div class="space-y-8">
              <h5 class="text-3xl font-semibold capitalize">
                  Formulir Data Penduduk
              </h5>
              <form wire:submit.prevent="submit" class="space-y-10">
                  <div class="space-y-6">
                      <div>
                          <h5 class="text-xl font-semibold capitalize">
                              data penduduk
                          </h5>
                          <p class="text-slate-600">
                              Silakan isi data sesuai dengan kartu keluarga dan identitas resmi.
                          </p>
                      </div>

                      <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                          <!-- No KK -->
                          <div class="space-y-2">
                              <label for="noKk" class="font-medium">Nomor KK</label>
                              <div>
                                  <input type="text" id="noKk" wire:model="noKk"
                                      class="w-full  text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                  @error('noKk')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- NIK -->
                          <div class="space-y-2">
                              <label for="nik" class="font-medium">NIK</label>
                              <div>
                                  <input type="text" id="nik" wire:model="nik"
                                      class="w-full  text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                  @error('nik')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Nama Lengkap -->
                          <div class="space-y-2">
                              <label for="namaLengkap" class="font-medium">Nama Lengkap</label>
                              <div>
                                  <input type="text" id="namaLengkap" wire:model="namaLengkap"
                                      class="w-full  text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                  @error('namaLengkap')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Jenis Kelamin -->
                          <div class="space-y-2">
                              <label for="jenisKelamin" class="font-medium">Jenis Kelamin</label>
                              <div>
                                  <select id="jenisKelamin" wire:model="jenisKelamin"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih jenis kelamin</option>
                                      <option value="L">Laki-laki</option>
                                      <option value="P">Perempuan</option>
                                  </select>
                                  @error('jenisKelamin')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Tanggal Lahir -->
                          <div class="space-y-2">
                              <label for="tanggalLahir" class="font-medium">Tanggal Lahir</label>
                              <div>
                                  <input type="date" id="tanggalLahir" wire:model="tanggalLahir"
                                      class="w-full  text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                  @error('tanggalLahir')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Hubungan Keluarga -->
                          <div class="space-y-2">
                              <label for="statusKeluarga" class="font-medium">Hubungan Dalam Keluarga</label>
                              <div>
                                  <select name="statusKeluarga" id="statusKeluarga" wire:model="statusKeluarga"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih hubungan</option>
                                      @foreach ($statusKeluargaOptions as $status)
                                          <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                                      @endforeach
                                  </select>
                                  @error('statusKeluarga')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Status -->
                          <div class="space-y-2">
                              <label for="statusKawin" class="font-medium">Status Perkawinan</label>
                              <div>
                                  <select id="statusKawin" wire:model="statusKawin"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih status</option>
                                      @foreach ($statusPerkawinanOptions as $status)
                                          <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                                      @endforeach
                                  </select>
                                  @error('status')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Agama -->
                          <div class="space-y-2">
                              <label for="agama" class="font-medium">Agama</label>
                              <div>
                                  <select id="agama" wire:model="agama"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih agama</option>
                                      @foreach ($agamaOptions as $agama)
                                          <option value="{{ $agama->id }}">{{ $agama->nama_agama }}</option>
                                      @endforeach

                                  </select>
                                  @error('agama')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Pendidikan -->
                          <div class="space-y-2">
                              <label for="pendidikan" class="font-medium">Pendidikan Terakhir</label>
                              <div>
                                  <select id="pendidikan" wire:model="pendidikan"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih pendidikan</option>
                                      @foreach ($pendidikanOptions as $pendidikan)
                                          <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama_pendidikan }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @error('pendidikan')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <!-- Pekerjaan -->
                          <div class="space-y-2">
                              <label for="pekerjaan" class="font-medium">Pekerjaan</label>
                              <div>
                                  <select id="pekerjaan" wire:model="pekerjaan"
                                      class="w-full  text-black bg-white border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black">
                                      <option value="">Pilih pekerjaan</option>
                                      @foreach ($pekerjaanOptions as $pekerjaan)
                                          <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama_pekerjaan }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @error('pekerjaan')
                                      <p class="text-sm text-red-600">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="space-y-6">
                      <button type="submit"
                          class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60"
                          wire:target="submit" wire:loading.attr="disabled">
                          <span class="font-medium tracking-wide">
                              Simpan Data
                          </span>
                          <svg wire:loading wire:target="submit" xmlns="http://www.w3.org/2000/svg"
                              class="w-5 h-5 animate-spin" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                          <a href="#" wire:click.prevent="closeModal()"
                              class="block w-full px-4 py-2 space-x-2 text-center text-white transition border rounded-md bg-slate-600 border-slate-600 hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75">
                              <span class="font-medium tracking-wide">
                                  Kembali
                              </span>
                          </a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
