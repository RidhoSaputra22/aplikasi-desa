<?php

namespace App\Livewire\Guest\Product;

use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public function render()
    {
        return view('components.product-modal.show');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
