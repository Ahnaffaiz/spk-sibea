<?php

namespace App\Http\Livewire\Skoring\Ahp;

use Livewire\Component;

class Index extends Component
{
    public $beasiswa, $user;
    
    public function render()
    {
        return view('livewire.skoring.ahp.index');
    }
}
