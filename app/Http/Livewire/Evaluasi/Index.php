<?php

namespace App\Http\Livewire\Evaluasi;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $user;

    public function render()
    {
        return view('livewire.evaluasi.index',[
            'beasiswas' => Beasiswa::where('nama', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }
}
