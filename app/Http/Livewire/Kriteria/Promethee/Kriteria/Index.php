<?php

namespace App\Http\Livewire\Kriteria\Promethee\Kriteria;

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
        return view('livewire.kriteria.promethee.kriteria.index',[
            'kriterias' => RefKriteria::where('nama', 'like', '%'.strtolower($this->search).'%')->orderBy('nama', 'ASC')->paginate(10),
        ]);
    }
}
