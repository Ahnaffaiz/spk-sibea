<?php

namespace App\Http\Livewire\Kriteria\Nilai;

use App\Models\RefKriteria;
use App\Models\RefNilaiKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nama, $nilai, $ref_kriterias_id, $ref_nilai_kriterias_id;

    protected $listeners = [
        'delete',
        'show',
        'add',
        'confirmDelete'
    ];

    protected $rules = [
        'nama' => 'required',
        'nilai' => 'required|min:0',
        'ref_kriterias_id' => 'required',  
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.kriteria.nilai.create',[
            'kriterias' => RefKriteria::orderBy('nama', 'ASC')->get(),
        ]);
    }

    public function add()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('showCreateModalNilaiKriteria');
    }

    public function store()
    {   
        $this->validate($this->rules);

        if($this->ref_nilai_kriterias_id == null) {
            $nilaiKriteria = RefNilaiKriteria::create([
                'ref_kriterias_id' => $this->ref_kriterias_id,
                'nama' => $this->nama,
                'nilai' => $this->nilai,
            ]);
        } else {
            $nilaiKriteria = RefNilaiKriteria::updateOrCreate([
                    'id' => $this->ref_nilai_kriterias_id,
                ],
                [
                    'ref_kriterias_id' => $this->ref_kriterias_id,
                    'nama' => $this->nama,
                    'nilai' => $this->nilai,
                ]
            );
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('hideCreateModalNilaiKriteria');
        $this->emit('nilaiKriteriaStore');
    }

    public function confirmDelete($id)
    {
        $this->ref_nilai_kriterias_id = $id;
        $this->alert('question', 'Apakah anda yakin akan menghapus nilai kriteria ini ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'cancel',
            'icon' => 'warning',
            'onConfirmed' => 'delete',
            'timer' => null,
        ]);
    }

    public function delete() 
    {
        $nilaiKriteria = RefNilaiKriteria::find($this->ref_nilai_kriterias_id);
        RefNilaiKriteria::destroy($nilaiKriteria->id);
        
        $this->resetInput();
        $this->emit('nilaiKriteriaDeleted');
    }

    public function show($id) 
    {
        $this->resetInput();

        $nilaiKriteria = RefNilaiKriteria::find($id);
        $this->ref_nilai_kriterias_id = $nilaiKriteria->id;
        $this->ref_kriterias_id = $nilaiKriteria->ref_kriterias_id;
        $this->nama = $nilaiKriteria->nama;
        $this->nilai = $nilaiKriteria->nilai;
        
        $this->dispatchBrowserEvent('showCreateModalNilaiKriteria');
    }

    public function resetInput()
    {
        $this->nama=null;
        $this->nilai=null;
        $this->ref_nilai_kriterias_id=null;
        $this->ref_kriterias_id=null;
    }


}
