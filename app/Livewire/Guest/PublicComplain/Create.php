<?php

namespace App\Livewire\Guest\PublicComplain;

use App\Models\PengaduanMasyarakat;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{

    use WithFileUploads;

    // Properties untuk form inputs
    public $name;
    public $mobilePhoneNumber;
    public $address;
    public $complaint;
    public $images = [];

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'mobilePhoneNumber' => 'required|string|max:15',
        'address' => 'required|string|max:500',
        'complaint' => 'required|string|max:1000',
        'images.*' => 'nullable|image|max:2048', // max 2MB per image
    ];

    // Custom validation messages
    protected $messages = [
        'name.required' => 'Nama lengkap wajib diisi.',
        'mobilePhoneNumber.required' => 'Nomor ponsel wajib diisi.',
        'address.required' => 'Alamat wajib diisi.',
        'complaint.required' => 'Aduan wajib diisi.',
        'images.*.image' => 'File harus berupa gambar.',
        'images.*.max' => 'Ukuran gambar maksimal 2MB.',
    ];

    public function mount()
    {
        // $this->name = "TEST";
        // $this->mobilePhoneNumber = "081234567890";
        // $this->address = "Jl. Contoh Alamat No.123, Kota Contoh";
        // $this->complaint = "Ini adalah contoh isi pengaduan masyarakat untuk keperluan testing aplikasi.";
        // $this->images = [];
    }

    public function submit()
    {
        $this->validate();
        try {

            // Handle image uploads
            $imagePaths = [];
            if (!empty($this->images)) {
                foreach ($this->images as $image) {
                    $imagePaths[] = $image->store('complaints', 'local');
                }
            }

            $data = PengaduanMasyarakat::create([
                'name' => $this->name,
                'no_hp' => $this->mobilePhoneNumber,
                'alamat' => $this->address,
                'isi_laporan' => $this->complaint,
                'foto' => !empty($imagePaths) ? $imagePaths : null,
            ]);

            $this->dispatch('openModal', 'guest.PublicComplain.ConfirmModal', [
                'code' => $data->code,
            ]);
        } catch (\Exception $e) {
            dd($e);
            $this->addError('submit', 'Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.');
            return;
        }
    }


    public function render()
    {
        return <<<'HTML'
         <div x-init="" @click.self="$wire.closeModal()" class="relative grid w-full h-screen p-6 overflow-y-auto md:p-10">

                <div class="relative w-full p-6 bg-white rounded-lg place-self-center md:max-w-md lg:max-w-4xl md:p-10">
                    <div class="space-y-8">
                        <h5 class="text-3xl font-semibold capitalize">
                            Formulir pengaduan masyarakat
                        </h5>
                        <form wire:submit.prevent="submit" class="space-y-10">
                            <div class="space-y-6">
                                <div>
                                    <h5 class="text-xl font-semibold capitalize">
                                        data pelapor
                                    </h5>
                                    <p class="text-slate-600">
                                        Data diri pelapor dijamin kerahasiaanya oleh pemerintah kelurahan tuwung
                                    </p>
                                </div>
                                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                                    <div class="space-y-2">
                                        <label for="name" class="font-medium">
                                            Nama lengkap
                                        </label>
                                        <div>
                                            <input type="text"
                                            class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black" id="name" wire:model="name">
                                                                            </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="mobile-phone-number" class="font-medium">
                                            Nomor ponsel
                                        </label>
                                        <div>
                                            <div class="flex items-center space-x-3">
                                                <span class="flex-shrink-0 px-4 py-2 border rounded-md border-slate-700">
                                                    62
                                                </span>
                                                <input type="number" class="w-full px-3 py-2 text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black" id="mobile-phone-number" wire:model="mobilePhoneNumber">
                                            </div>
                                                                            </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="address" class="font-medium">
                                            Alamat
                                        </label>
                                        <div>
                                            <textarea class="w-full min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black" id="address" wire:model="address"></textarea>
                                                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <h5 class="text-xl font-semibold capitalize">
                                    uraian pengaduan
                                </h5>
                                <div class="grid grid-cols-1 gap-6 gap-x-0">
                                    <div class="space-y-2">
                                        <label for="complaint" class="font-medium">
                                            Aduan
                                        </label>
                                        <div>
                                            <textarea class="w-full min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black" id="complaint" wire:model="complaint"></textarea>
                                                                            </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="#" class="font-medium">
                                            Bukti lampiran (jika ada)
                                        </label>
                                        <div>
                                            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                                                                                                                                    <div>
                                                        <div class="relative h-40 overflow-hidden rounded-md">
                                                            <div wire:loading.remove="" wire:target="images" class="grid w-full h-full justify-items-stretch">
                                                                <label for="images" class="flex flex-col items-center justify-center p-3 space-y-2 capitalize transition border rounded-md cursor-pointer text-slate-700 hover:text-black border-slate-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <circle cx="12" cy="13" r="3"></circle>
                                                                        <path d="M5 7h2a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h2m9 7v7a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                                                                        <line x1="15" y1="6" x2="21" y2="6"></line>
                                                                        <line x1="18" y1="3" x2="18" y2="9"></line>
                                                                    </svg>
                                                                    <span class="text-sm leading-tight text-center capitalize">
                                                                        {{ count($images) > 0 ? count($images) . ' file dipilih' : 'tambah gambar' }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div wire:loading.block="" wire:target="images">
                                                                <div class="absolute inset-0 grid w-full h-full p-2 rounded-md justify-items-stretch bg-black/30">
                                                                    <div class="flex flex-col items-center justify-center w-full h-full text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 animate-spin" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="file" id="images" class="hidden" wire:model="images" multiple="" accept="image/png, image/jpg, image/jpeg">
                                                    </div>
                                                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6">
                                                        <div class="space-y-2">
                                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60" wire:target="submit" wire.loading.attr.disabled="">
                                        <span class="font-medium tracking-wide">
                                            Buat surat keterangan
                                        </span>
                                        <svg wire:loading="" wire:target="submit" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                        <a href="#" wire:click.prevent="closeModal()" class="block w-full px-4 py-2 space-x-2 text-center text-white transition border rounded-md bg-slate-600 border-slate-600 hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75">
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
            </div>
        HTML;
    }
}
