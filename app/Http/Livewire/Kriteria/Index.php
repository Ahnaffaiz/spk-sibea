<?php

namespace App\Http\Livewire\Kriteria;

use Livewire\Component;

class Index extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire.kriteria.index');
    }
}
