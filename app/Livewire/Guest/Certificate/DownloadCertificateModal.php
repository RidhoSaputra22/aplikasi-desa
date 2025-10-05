<?php

namespace App\Livewire\Guest\Certificate;

use Livewire\Component;

class DownloadCertificateModal extends Component
{
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
                        Surat keterangan berhasil dibuat
                    </p>
                    <div class="space-y-2">
                        <p class="text-xl font-light leading-tight text-center">
                            Simpan surat keterangan dengan baik dan tunjukkan kepada pihak yang membutuhkan
                        </p>
                        <p class="text-xl font-light leading-tight text-center">
                            Untuk memantau status surat keterangan, unduh dan scan QRCode pada bukti pembuatan surat keterangan
                        </p>
                    </div>
                </div>
            </div>
        </div>
        HTML;
    }
}
