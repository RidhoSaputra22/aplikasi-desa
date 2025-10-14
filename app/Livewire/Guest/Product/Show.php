<?php

namespace App\Livewire\Guest\Product;

use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public $data; // pastikan publik agar bisa diisi otomatis dari modal

    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('components.product-modal.show');
    }
}
