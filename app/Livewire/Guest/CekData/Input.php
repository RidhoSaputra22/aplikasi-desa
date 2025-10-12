<?php

namespace App\Livewire\Guest\CekData;

use Livewire\Component;

class Input extends Component
{

    public $nik;

    public function submit()
    {
        $this->validate([
            'nik' => 'required|digits:16',
        ]);
    }

    public function render()
    {
        return view('cek-data');
    }
}
