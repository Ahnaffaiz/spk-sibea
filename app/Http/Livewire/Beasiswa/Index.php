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
        'beasiswaStore',
        'beasiswaDeleted'
    ];

    public function render()
    {
        return view('livewire.beasiswa.index',[
            'beasiswas' => Beasiswa::where('nama', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }

    public function beasiswaStore()
    {
        $this->alert('success', 'Berhasil menambahkan beasiswa');
    }

    public function beasiswaDeleted()
    {
        $this->alert('success', 'Berhasil menghapus beasiswa');
    }
}
