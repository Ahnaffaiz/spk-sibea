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

    public $beasiswa_id, $nama, $bobot, $total, $kuota;


    protected $listeners = [
        'delete',
        'show',
        'add',
        'confirmDelete'
    ];

    protected $rules = [
        'nama' => 'required',
        'kuota' => 'required',
        'bobot.sta' => 'required',
        'bobot.sti' => 'required',
        'bobot.skr' => 'required',
        'bobot.spa' => 'required',
        'bobot.spi' => 'required',
        'bobot.ska' => 'required',
        'bobot.ski' => 'required',
        'bobot.sjt' => 'required',
        'bobot.sha' => 'required',
        'bobot.shi' => 'required',
        'bobot.sho' => 'required',
        'bobot.skj' => 'required',
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
                'nama' => strtolower($this->nama),
                'kuota' => $this->kuota
            ]);
        } else {
            $beasiswa = Beasiswa::updateOrCreate([
                    'id' => $this->beasiswa_id,
                ],
                [
                    'nama' => strtolower($this->nama),
                    'kuota' => $this->kuota,
                ]
            );
        }

        foreach ($this->bobot as $key => $value) {
            $kriteria = RefKriteria::where('kode', strtolower($key))->first();
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
        $this->kuota = $beasiswa->kuota;
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
        $this->kuota=null;
        $this->total=null;
        $this->beasiswa_id=null;
    }
}
