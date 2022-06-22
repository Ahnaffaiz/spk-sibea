<?php

namespace App\Http\Livewire\Kriteria\Promethee\Nilai;

use App\Models\RefKriteria;
use App\Models\RefNilaiKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nama_awal, $nama_akhir, $nilai, $ref_kriterias_id, $ref_nilai_kriterias_id;

    protected $listeners = [
        'delete',
        'show',
        'add',
        'confirmDelete'
    ];

    protected $rules = [
        'nama_awal' => 'required',
        'nilai' => 'required|min:0',
        'ref_kriterias_id' => 'required',  
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.kriteria.promethee.nilai.create',[
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
                'nama_awal' => strtolower($this->nama_awal),
                'nama_akhir' => strtolower($this->nama_akhir),
                'nilai' => $this->nilai,
            ]);
        } else {
            $nilaiKriteria = RefNilaiKriteria::updateOrCreate([
                    'id' => $this->ref_nilai_kriterias_id,
                ],
                [
                    'ref_kriterias_id' => $this->ref_kriterias_id,
                    'nama_awal' => strtolower($this->nama_awal),
                    'nama_akhir' => strtolower($this->nama_akhir),
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
        $this->nama_awal = $nilaiKriteria->nama_awal;
        $this->nama_akhir = $nilaiKriteria->nama_akhir;
        $this->nilai = $nilaiKriteria->nilai;
        
        $this->dispatchBrowserEvent('showCreateModalNilaiKriteria');
    }

    public function resetInput()
    {
        $this->nama_awal=null;
        $this->nama_akhir=null;
        $this->nilai=null;
        $this->ref_nilai_kriterias_id=null;
        $this->ref_kriterias_id=null;
    }


}
