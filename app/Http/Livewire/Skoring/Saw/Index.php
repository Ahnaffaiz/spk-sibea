<?php

namespace App\Http\Livewire\Skoring\Saw;

use Livewire\Component;

class Index extends Component
{
    public $beasiswa, $user;
    
    public function render()
    {
        return view('livewire.skoring.saw.index');
    }
}
