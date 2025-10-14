<?php

namespace App\Livewire\Guest\Publikasi;

use Livewire\Component;

class Pencarian extends Component
{
    public $search = '';


    public function render()
    {
        $results = \App\Models\BeritaDesa::where('judul', 'like', '%' . $this->search . '%')
            ->orWhere('judul', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('publikasi.pencarian', compact('results'))->extends('layouts.app')->section('content');
    }
}
