<?php

namespace App\Http\Livewire\Skoring\Promethee;

use App\Models\Pendaftar;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $beasiswa, $user;
    
    public function render()
    {   
        return view('livewire.skoring.promethee.index');
    }
}
