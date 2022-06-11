<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    
    use LivewireAlert;
    use WithPagination;
    
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $user;

    protected $listeners = [
        'beasiswaStore'
    ];

    public function render()
    {
        return view('livewire.beasiswa.index');
    }

    public function beasiswaStore()
    {
        $this->alert('success', 'Berhasil menambahkan beasiswa');
    }

    public function addBeasiswa()
    {
        $this->dispatchBrowserEvent('showCreateModalBeasiswa');
    }
}
