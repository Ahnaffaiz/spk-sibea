<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use App\Models\BobotKriteria;
use App\Models\RefKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $beasiswa_id, $nama, $bobot, $total;


    protected $listeners = [
        'delete',
        'show',
        'add',
        'confirmDelete'
    ];

    protected $rules = [
        'nama' => 'required',
        'bobot.sta' => 'required',
        'bobot.sti' => 'required',
        'bobot.sr1' => 'required',
        'bobot.spa' => 'required',
        'bobot.spi' => 'required',
        'bobot.ska' => 'required',
        'bobot.ski' => 'required',
        'bobot.t01' => 'required',
        'bobot.pa1' => 'required',
        'bobot.pi1' => 'required',
        'bobot.p01' => 'required',
        'bobot.sj1' => 'required',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function updatedBobot()
    {
        $this->total = 0;
        foreach ($this->bobot as $key => $value) {
            if(is_numeric($value)){
                $this->total += $value;
            }
        }
    }

    

    public function render()
    {
        return view('livewire.beasiswa.create');
    }

    public function add()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('showCreateModalBeasiswa');
    }

    public function store()
    {   
        $this->validate($this->rules);

        if($this->beasiswa_id == null) {
            $beasiswa = Beasiswa::create([
                'nama' => $this->nama
            ]);
        } else {
            $beasiswa = Beasiswa::updateOrCreate([
                    'id' => $this->beasiswa_id,
                ],
                [
                    'nama' => $this->nama,
                ]
            );
        }

        foreach ($this->bobot as $key => $value) {
            $kriteria = RefKriteria::where('kode', strtoupper($key))->first();
            BobotKriteria::updateOrCreate([
                    'beasiswas_id' => $beasiswa->id,
                    'ref_kriterias_id' => $kriteria->id,
                ],
                [
                    'bobot' => $value
                ]
            );
        }

        

        $this->resetInput();
        $this->dispatchBrowserEvent('hideCreateModalBeasiswa');
        $this->emit('beasiswaStore');
    }

    public function confirmDelete($id)
    {
        $this->beasiswa_id = $id;
        $this->alert('question', 'Apakah anda yakin akan menghapus beasiswa ini ?', [
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
        $beasiswa = Beasiswa::find($this->beasiswa_id);
        Beasiswa::destroy($beasiswa->id);
        
        $this->resetInput();
        $this->emit('beasiswaDeleted');
    }

    public function show($id) 
    {
        $this->resetInput();

        $beasiswa = Beasiswa::find($id);
        $this->beasiswa_id = $beasiswa->id;
        $this->nama = $beasiswa->nama;
        foreach ($beasiswa->getBobot as $bobot) {
            $this->bobot[strtolower($bobot->getKriteria->kode)] = $bobot->bobot;
            $this->total += $bobot->bobot;
        }
        $this->dispatchBrowserEvent('showCreateModalBeasiswa');
    }

    public function resetInput()
    {
        $this->nama=null;
        $this->bobot=null;
        $this->total=null;
        $this->beasiswa_id=null;
    }
}
