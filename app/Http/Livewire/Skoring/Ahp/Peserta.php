<?php

namespace App\Http\Livewire\Skoring\Ahp;

use App\Models\Pendaftar;
use Livewire\Component;
use Livewire\WithPagination;

class Peserta extends Component
{
    use WithPagination;

    public $beasiswa;
    
    public $user;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.skoring.ahp.peserta',[
            'pendaftars' => Pendaftar::where('beasiswas_id', $this->beasiswa->id)->orderBy('nama', 'ASC')->paginate(10)
        ]);
    }
}
