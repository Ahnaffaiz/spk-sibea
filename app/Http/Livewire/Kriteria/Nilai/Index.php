<?php

namespace App\Http\Livewire\Kriteria\Nilai;

use App\Models\RefKriteria;
use App\Models\RefNilaiKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $search, $kriteria, $refKriterias;

    public $user;

    protected $listeners = [
        'nilaiKriteriaStore',
        'nilaiKriteriaDeleted'
    ];

    public function render()
    {
        return view('livewire.kriteria.nilai.index',[
            'nilaiKriterias' => RefNilaiKriteria::
            when($this->search, function($query, $search){
                $idList = RefKriteria::where('nama', 'like', '%'.$search.'%')->get()->pluck('id')->toArray();
                return $query->whereIn('ref_kriterias_id', $idList);
            })->orWhere('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')->paginate(10)
        ]);
    }

    public function nilaiKriteriaStore()
    {
        $this->alert('success', 'Berhasil menambahkan nilai kriteria');
    }

    public function nilaiKriteriaDeleted()
    {
        $this->alert('success', 'Berhasil menghapus nilai kriteria');
    }
}
