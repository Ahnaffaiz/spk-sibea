<?php

namespace App\Http\Livewire\Kriteria\Kriteria;

use App\Models\RefKriteria;
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
        return view('livewire.kriteria.kriteria.index',[
            'kriterias' => RefKriteria::where('nama', 'like', '%'.$this->search.'%')->orderBy('nama', 'ASC')->paginate(10),
        ]);
    }
}
