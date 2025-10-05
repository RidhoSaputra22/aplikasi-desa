<?php

namespace App\Livewire\Guest\Certificate;

use LivewireUI\Modal\ModalComponent;

class ConfirmModal extends ModalComponent
{
    public $code;

    public function mount($code = null)
    {
        $this->code = $code;
    }

    public function render()
    {
        return <<<'HTML'
        <div class="w-full p-6 bg-white rounded-lg place-self-center md:max-w-xl lg:max-w-2xl lg:p-10">
            <div class="flex flex-col items-center space-y-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-green-600" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M9 12l2 2l4 -4"></path>
                </svg>
                <div class="space-y-4">
                    <p class="text-2xl font-semibold leading-snug text-center">
                        Berhasil membuat surat keterangan domisili dengan kode <span class="font-bold text-green-600">{{ $code }}</span>
                    </p>
                    <div class="space-y-2">
                        <p class="text-xl font-light leading-tight text-center">
                            Surat keterangan dapat langsung diunduh tanpa harus pergi ke kantor desa setelah petugas melakukan konfirmasi
                        </p>
                        <p class="text-xl font-light leading-tight text-center">
                            Untuk memantau status surat keterangan, unduh dan scan QRCode pada bukti pembuatan surat keterangan di bawah ini
                        </p>
                    </div>
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('surat-online.bukti-pembuatan-surat', ['code' => $code]) }}" target="_blank" class="flex items-center justify-center px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75">
                        Unduh bukti pembuatan surat keterangan
                    </a>
                </div>
            </div>
        </div>
        HTML;
    }
}